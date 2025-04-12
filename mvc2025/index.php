<?php
    #iniciar sesión
    session_start();

    #conectar a la bd
    require_once 'model/Conexion.php';

    # controlador por defecto
    $controller = 'Login';

    #comprobar que controlador usar
    if (!isset($_REQUEST['c'])) {
        # call controller for default
        require_once 'controller/'.$controller.'Controller.php';
        $controller = $controller.'Controller';
        # instancia de la clase
        $controller = new $controller;

        # usar el método Index()
        $controller->index();

    } else { # cuando la c tiene valor
        # decodificar el controlador
        $controller = base64_decode($_REQUEST['c']);
        #seleccionamos la acción
        $accion = isset($_REQUEST['a']) ? base64_decode($_REQUEST['a']) : 'index';
        require_once 'controller/'.$controller.'Controller.php';
        $controller = $controller.'Controller';
        # instancia de la clase
        $controller = new $controller;

        # usar controlador y el método
        call_user_func(array($controller, $accion));
    }

?>