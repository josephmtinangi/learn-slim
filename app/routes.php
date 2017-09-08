<?php

$app->get('/', ['App\Controllers\HomeController', 'index'])->setName('home');

$app->get('/login', ['App\Controllers\Auth\LoginController', 'showLoginForm'])->setName('login');
$app->post('/login', ['App\Controllers\Auth\LoginController', 'login'])->setName('login');

$app->get('/projects', ['App\Controllers\ProjectController', 'index'])->setName('projects.index');
$app->get('/projects/create', ['App\Controllers\ProjectController', 'create'])->setName('projects.create');
$app->get('/projects/{id}', ['App\Controllers\ProjectController', 'show'])->setName('projects.show');
$app->get('/projects/{id}/edit', ['App\Controllers\ProjectController', 'edit'])->setName('projects.edit');
$app->patch('/projects/{id}', ['App\Controllers\ProjectController', 'update'])->setName('projects.update');
$app->post('/projects', ['App\Controllers\ProjectController', 'store'])->setName('projects.store');
