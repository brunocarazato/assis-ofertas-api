<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserRepository;
use Slim\App;
use PDO;

class UserDAO implements UserRepository
{

    /**
     * @param User[]|null $promocoes
     */
    public function __construct(array $promocoes = null, PDO $connection)
    {
        $this->connection = $connection;
    }


    public function auth(User $novo): array
    {
        // $sth = $this->connection->prepare("SELECT * from user WHERE email = :email AND senha = :senha");
        // $sth->execute(array('email' => $novo->getEmail(), 'senha' => $novo->getSenha()));
        // $data = $sth->fetchAll(\PDO::FETCH_ASSOC);
        
        // return array_values($data);


        $sth = $this->connection->prepare("SELECT * from user WHERE email = :email");
        $sth->execute(array('email' => $novo->getEmail()));
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);
        if($data){
            if(password_verify($novo->getSenha(), $data[0]['senha'])){
                $data[0]['senha'] = "";
                return array_values($data);    
            }
        }
        return array();//retornando array vazio
    }


    public function create(User $novo): string
    {
        $novo->setSenha(password_hash($novo->getSenha(), PASSWORD_BCRYPT, ['cost' => 12]));
        $sth = $this->connection->prepare("INSERT INTO user(email, senha, nome) VALUES (:email, :senha, :nome)");
        $sth->execute(array('email' => $novo->getEmail(), 'senha' => $novo->getSenha(), 'nome' => $novo->getNome()));
        $sth->fetchAll(\PDO::FETCH_ASSOC);
        $lastId = $this->connection->lastInsertId();

        return $lastId;
    }


}
