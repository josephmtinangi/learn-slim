<?php

namespace App\Controllers;

use App\Models\Project;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

class ProjectController
{
    public function index(Request $request, Response $response, Twig $view, Project $project)
    {
        $projects = Project::get();

        return $view->render($response, 'projects/index.twig', [
            'projects' => $projects
        ]);
    }

    public function show($id, Request $request, Response $response, Twig $view, Project $project)
    {
        $project = Project::find($id);

        return $view->render($response, 'projects/show.twig', [
            'project' => $project
        ]);
    }
}