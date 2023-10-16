<?php
require __DIR__ . '/controller/JuegoController.php';
require __DIR__ . '/controller/LoginController.php';


// define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// En el head html:   <base href="'.BASE_URL.'">


// SERVER_NAME: Nombre del server (localhost)
// SERVER_PORT: Nro puerto server (por default no se vé)
// PHP_SELF: El script que se está ejecutando.
// dirname(): Nos devuelve el directorio del script que le pasemos por parametro.

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$url = $_GET['action'];

$partes = explode('/', $url);

$route = $partes[0];

$params = explode('/', $url);

switch ($route) {
    case '':
        include './templates/home.phtml';
        break;
    case 'juegos':
        $controller = new JuegoController();
        $controller->showJuegos();
        break;
    case 'juego':
        $controller = new JuegoController();
        $controller->showJuego($_GET['id']);
        break;
    case 'login':
        $controller = new LoginController();


        $controller->showLogin();
        break;
    case 'auth':
        $controller = new LoginController();
        $controller->auth();
        break;
    case 'categorias':
        $controller = new JuegoController();


        if (isset($params[1])) {
            $controller->showGamesByCategory(strtolower($params[1]));
        } else {
            $controller = new JuegoController();
            $controller->showCategoria();
        }
        break;

    case 'logout':
        $controller = new LoginController();
        $controller->logout();

        break;

    case 'admin':
        $controller = new LoginController();
        $controller->showAdminWindow();
        break;
    case 'createForm':
        $controller = new JuegoController();
        $controller->showCreateForm();
        break;
    case 'create':
        $controller = new JuegoController();
        $controller->createJuego();
        break;

    case 'updateForm':
        $controller = new JuegoController();
        $controller->updateJuegoAsk($params[1]);
        break;
    case 'updateGame':
        $controller = new JuegoController();
        $controller->updateJuego($params[1]);
        break;
    case 'deleteJuego':
        $controller = new JuegoController();
        $controller->deleteJuego($_GET['id']);
        break;
    case 'deleteJuegoConfirm':
        $controller = new JuegoController();
        $controller->deleteJuegoAsk($params[1]);
        break;
    default:
        include './templates/404.phtml';
        break;
}
