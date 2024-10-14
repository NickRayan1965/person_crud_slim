<?php
use DI\Container;
use App\Services\UserService;
use App\Controllers\UserController;
return function(Container $container) {
    
    $container->set(UserService::class, function(){
        return new UserService();
    });
    $container->set(UserController::class, function(Container $container){
        return new UserController($container->get(UserService::class));
    });

};