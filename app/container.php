<?php

use App\Models\User;
use Interop\Container\ContainerInterface;
use Slim\Views\Twig;
use function DI\get;

return [
    'route' => get(Slim\Router::class),
    Twig::class => function (ContainerInterface $c) {
        $twig = new Twig(__DIR__ . '/../resources/views', [
            'cache' => false
        ]);

        $twig->addExtension(new \Slim\Views\TwigExtension(
            $c->get('router'),
            $c->get('request')->getUri()
        ));

        return $twig;
    },
    User::class => function (ContainerInterface $c) {
        return new User;
    }
];
