<?php

namespace App\Controllers;

use App\Models\User;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

class HomeController
{
    public function index(Request $request, Response $response, Twig $view)
    {
        $users = User::get();

        return $view->render($response, 'home.twig', [
            'users' => $users,
        ]);
    }
}