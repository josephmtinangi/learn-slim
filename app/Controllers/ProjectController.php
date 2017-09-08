<?php

namespace App\Controllers;

use App\Models\Project;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Router;
use Slim\Views\Twig;

class ProjectController
{
    protected $view;

    function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function index(Request $request, Response $response, Project $project)
    {
        $projects = Project::get();

        return $this->view->render($response, 'projects/index.twig', [
            'projects' => $projects
        ]);
    }

    public function show($id, Request $request, Response $response, Router $router, Project $project)
    {
        $project = Project::find($id);

        if (!$project) {
            return $response->withRedirect($router->pathFor('home'));
        }

        return $this->view->render($response, 'projects/show.twig', [
            'project' => $project
        ]);
    }
}