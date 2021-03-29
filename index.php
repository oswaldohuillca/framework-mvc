<?php
spl_autoload_register();
 use src\controllers\router;
 $router = new router;
 $router->run();