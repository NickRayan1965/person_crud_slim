<?php
use Slim\App;
use App\Controllers\UserController;
return function(App $app) {
    $app->get('/users', UserController::class . ':getAll');
    $app->get('/users/{id}', UserController::class . ':getById');
    $app->post('/users', UserController::class . ':create');
    $app->put('/users/{id}', UserController::class . ':update');
    $app->delete('/users/{id}', UserController::class . ':delete');
};