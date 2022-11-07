<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;

use DateTime;

class UserLoginAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $data = $this->getFormData();
        $userLogin = new User();

        $userLogin->setEmail($data['email']);
        $userLogin->setSenha($data['senha']);

        $user = $this->userRepository->auth($userLogin);

        $this->logger->info("User is tring to loggin");
        
        if(!$user){
            throw new UserNotFoundException();
        }
        return $this->respondWithData($user);
    }

    
}
