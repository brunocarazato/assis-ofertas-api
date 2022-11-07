<?php
declare(strict_types=1);

use App\Domain\User\UserRepository;
// use App\Domain\User\User;
// use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use App\Infrastructure\Persistence\User\UserDAO;
use App\Domain\Promocao\PromocaoRepository;
use App\Infrastructure\Persistence\Promocao\PromocaoDAO;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    // $containerBuilder->addDefinitions([
    //     UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
    // ]);
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(UserDAO::class),
    ]);   
    $containerBuilder->addDefinitions([
        PromocaoRepository::class => \DI\autowire(PromocaoDAO::class),
    ]);
};
