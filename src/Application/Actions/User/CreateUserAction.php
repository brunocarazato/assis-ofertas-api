<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use App\Domain\User\User;
use DateTime;

class CreateUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $data = $this->getFormData();
        $novo = new User();
        
        $novo->setEmail($data['email']);
        $novo->setSenha($data['senha']);
        $novo->setNome($data['nome']);
        
        $user = $this->userRepository->create($novo);

        $this->logger->info("User is being created");
        
        if(!$user){
            throw new HttpBadRequestException($this->request, "Não é possível utilizar este e-mail. Por favor informe outro.");
        }
        return $this->respondWithData($user);
    }

}
