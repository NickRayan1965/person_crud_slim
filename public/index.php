<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DI\Container;
require __DIR__ . '/../vendor/autoload.php';

# Create Container using PHP-DI
$container = new Container();
AppFactory::setContainer($container);


#db connection
$dbConfig = require __DIR__ . '/../src/config/database.php';
$dbConfig();
#dependencies
$dependencies = require __DIR__ . '/../src/config/dependencies.php';
$dependencies($container);

#app
$app = AppFactory::create();
$app->addBodyParsingMiddleware();

$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

#routes
$routes = require __DIR__ . '/../src/routes/Routes.php';
$routes($app);
$app->get('/', function (Request $request, Response $response, $args) {
  $response->getBody()->write("Hello, World!");
  return $response;
});

$app->run();