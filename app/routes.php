<?php

$app->get('/', ['App\Controllers\HomeController', 'index'])->setName('home');

$app->get('/projects', ['App\Controllers\ProjectController', 'index'])->setName('projects.index');
