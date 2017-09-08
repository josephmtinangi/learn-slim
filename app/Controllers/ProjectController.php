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

    public function create(Request $request, Response $response)
    {
        return $this->view->render($response, 'projects/create.twig');
    }

    public function store(Request $request, Response $response, Router $router)
    {
        $data = $request->getParsedBody();

        $name = filter_var($data['name'], FILTER_SANITIZE_STRING);

        Project::create([
            'name' => $name,
            'user_id' => 1,
        ]);

        return $response->withRedirect($router->pathFor('projects.index'));
    }

    public function edit($id, Request $request, Response $response, Router $router)
    {
        $project = Project::find($id);

        if (!$project) {
            return $response->withRedirect($router->pathFor('home'));
        }

        return $this->view->render($response, 'projects/edit.twig', [
            'project' => $project
        ]);
    }

    public function update($id, Request $request, Response $response, Router $router)
    {
        $project = Project::find($id);

        if (!$project) {
            return $response->withRedirect($router->pathFor('home'));
        }

        $data = $request->getParsedBody();

        $name = filter_var($data['name'], FILTER_SANITIZE_STRING);
        $description = filter_var($data['description'], FILTER_SANITIZE_STRING);
        $starts_at = $data['starts_at'];
        $ends_at = $data['ends_at'];
        $income_expected = $data['income_expected'];

        $project->update([
            'name' => $name,
            'description' => $description,
            'starts_at' => $starts_at,
            'ends_at' => $ends_at,
            'income_expected' => $income_expected,
        ]);

        return $response->withRedirect($router->pathFor('projects.edit', ['id' => $project->id]));
    }
}