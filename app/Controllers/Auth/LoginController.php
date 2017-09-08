<?php

namespace App\Controllers\Auth;

use App\Models\User;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Router;
use Slim\Views\Twig;

class LoginController
{
    public function showLoginForm(Request $request, Response $response, Twig $view)
    {
        return $view->render($response, 'auth/login.twig');
    }

    public function login(Request $request, Response $response, Router $router)
    {
        $data = $request->getParsedBody();

        $email = $data['email'];
        $password = $data['password'];

        $user = User::where('email', $email)->where('password', md5($password))->first();

        if (!$user) {
            return $response->withRedirect($router->pathFor('login'));
        }

        return $response->withRedirect($router->pathFor('home'));
    }
}