<?php
    session_start();
    require 'config.php';
    require 'src/router.php';
    require 'src/routes.php';

    //configuració entorn
    
    //enrutament
    $controlador=getRouter($routes);

    require 'src/controllers/'.$controlador.'.php';
    //crida el controlador