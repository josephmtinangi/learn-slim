<?php

namespace App\Controllers\Auth;

use App\Models\User;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Router;
use Slim\Views\Twig;

class RegisterController
{
    public function showRegistrationForm(Request $request, Response $response, Twig $view)
    {
        return $view->render($response, 'auth/register.twig');
    }

    public function register(Request $request, Response $response, Router $router)
    {
        $data = $request->getParsedBody();

        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => md5($password)
        ]);

        // TODO: Validate

        if (!$user) {
            return $response->withRedirect($router->pathFor('register'));
        }

        return $response->withRedirect($router->pathFor('home'));
    }
}