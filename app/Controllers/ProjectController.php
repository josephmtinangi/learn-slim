<?php

namespace App\Controllers;

use App\Models\Project;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class ProjectController
{
    public function index(RequestInterface $request, ResponseInterface $response, Twig $view, Project $project)
    {
        $projects = Project::get();

        return $view->render($response, 'projects/index.twig', [
            'projects' => $projects
        ]);
    }
}