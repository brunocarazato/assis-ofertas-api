<?php
declare(strict_types=1);

namespace App\Domain\User;

interface UserRepository
{
    /**
     * @return User[]
     */
    //public function findAll(): array;



    /**
     * @param User $user
     * @return User
     * @throws UserNotFoundException
     */
    public function auth(User $user): array;


    // /**
    //  * @param User $user
    //  * @return User
    //  * @throws UserNotFoundException
    //  */
    public function create(User $user): string;

    /**
     * @param int $id
     * @return User
     * @throws UserNotFoundException
     */
    //public function findUserOfId(int $id): User;
}
