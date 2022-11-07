<?php
declare(strict_types=1);

namespace App\Application\Actions\Promocao;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use App\Domain\Promocao\Promocao;
use DateTime;

class CreatePromocaoAction extends PromocaoAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $data = $this->getFormData();
        $novo = new Promocao();
        
        $fileName = $this->uploadImagem($_FILES['fotoPromocao']['name'], $_FILES['fotoPromocao']['tmp_name'], $_FILES['fotoPromocao']['size']);
        if($fileName){
            $novo->setFotoPromocao($fileName);
        }

        $novo->setAtiva((bool)$data['ativa']);
        $novo->setProduto($data['produto']);
        $novo->setCategoria((int)$data['categoria']);
        $novo->setDataIni(new DateTime($data['dataIni']));
        $novo->setDataFim(new DateTime($data['dataFim']));
        $promocao_id = $this->promocaoRepository->create($novo);

        $this->logger->info("Promocao is being created");
        
        if(!$promocao_id){
            throw new HttpBadRequestException($this->request, "Não foi possível criar a promoção. Por favor verifique as informações e tente novamente.");
        }
        return $this->respondWithData($promocao_id);
    }

    public function uploadImagem($fileName, $tempPath, $fileSize){
        $uploadStatus = 0;

        if(empty($fileName)){
            $errorMSG = json_encode(array("message" => "please select image", "status" => false));	
            echo $errorMSG;
        }
        else{
            $upload_path = '/images/'; // set upload folder path 
        }

        $fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); // get image extension
		
        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
                        
        // allow valid image file formats
        if(in_array($fileExt, $valid_extensions))
        {				
            //check file not exist our upload folder path
            if(!file_exists($upload_path . $fileName))
            {
                // check file size '5MB'
                if($fileSize < 5000000){
                    $uploadStatus = move_uploaded_file($tempPath, PUBLIC_DIR.$upload_path . $fileName); // move file from system temporary path to our upload folder path 
                }
                else{		
                    $errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
                    echo $errorMSG;
                }
            }
            else
            {		
                $errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));	
                echo $errorMSG;
            }
        }
        else
        {		
            $errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));	
            echo $errorMSG;		
        }

        if($uploadStatus){
            return $fileName;
        }
        return false;
    }
}
