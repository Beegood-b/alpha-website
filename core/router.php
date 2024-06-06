<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
  '/' => './app/controllers/index.php',
  '/privacy' => './app/controllers/privacy.php',
];

//function that handles routing
function routeController($uri, $routes)
{
  if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
  } else {
    abort();
  }
}

function abort($code = 404)
{
  http_response_code($code);

  require "./app/views/errors/{$code}.php";

  die();
}

routeController($uri, $routes);