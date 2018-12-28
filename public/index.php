<?php
if( !session_id() ) @session_start();
require '../vendor/autoload.php';
use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions([
 
 \League\Plates\Engine::class => function() {
    return new \League\Plates\Engine('../app/view');
  },
  
  \PDO::class => function() {
    $driver = 'mysql';
    $host = 'Localhost';
    $db_name = 'test_bd';
    $user = 'root';
    $user_pass = '';
    $charset = 'utf8';
    return new \PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $user, $user_pass);
  },
  \Aura\SqlQuery\QueryFactory::class => function() {
  return new \Aura\SqlQuery\QueryFactory('mysql');
  },
  \Delight\Auth\Auth::class => function($containerBuilder) {
    return new Delight\Auth\Auth($containerBuilder->get('PDO'));
  }
]);
$cB = $containerBuilder->build();
//d($cB); die;


//$tmp = new League\Plates\Engine('../app/view/');


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
  $r->addRoute('GET', '/', ['App\Controllers\HomeController', 'base']);
  $r->addRoute('GET', '/home', ['App\Controllers\HomeController', 'base']);
  $r->addRoute('GET', '/about', ['App\Controllers\HomeController', 'aboutPage']);
  $r->addRoute('GET', '/create', ['App\Controllers\HomeController', 'createPage']);
  

//  $r->addRoute('GET', '/create', 'get_all_users_handler');
//  $r->addRoute('GET', '/users', 'get_all_users_handler');
//  // {id} must be a number (\d+)
//  $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
//  // The /{title} suffix is optional
//  $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

//d($dispatcher);

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
  $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
  case FastRoute\Dispatcher::NOT_FOUND:
    echo '404';
    break;
    
  case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
    $allowedMethods = $routeInfo[1];
    echo 'Метод не разрешен';
    break;
    
  case FastRoute\Dispatcher::FOUND:
    $handler = $routeInfo[1];
    $vars = $routeInfo[2];
    
    $cB->call($handler, $vars);

    break;
}

