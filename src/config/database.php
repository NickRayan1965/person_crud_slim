<?php
use Illuminate\Database\Capsule\Manager as Capsule;
return function () {
    $capsule = new Capsule();
    $capsule->addConnection([
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'database' => 'person_app',
        'username' => 'root',
        'password' => '1234',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '', 
    ]);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
};