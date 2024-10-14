<?php
use Slim\App;
return function(App $app) {
    (require __DIR__ . '/UserRoutes.php')($app);
};