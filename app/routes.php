<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\UserLoginAction;
use App\Application\Actions\User\CreateUserAction;

use App\Application\Actions\Promocao\ListPromocaoAction;
use App\Application\Actions\Promocao\CreatePromocaoAction;
use App\Application\Actions\Promocao\ViewPromocaoAction;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world2!');
        return $response;
    });

    $app->post('/login', UserLoginAction::class);

    $app->group('/user', function (Group $group) {
        $group->post('', CreateUserAction::class);
        //$group->get('', ListUsersAction::class);
        //$group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/promocao', function (Group $group) {
        $group->get('', ListPromocaoAction::class);
        $group->post('', CreatePromocaoAction::class);
    });
};
