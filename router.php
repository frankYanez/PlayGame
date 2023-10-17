<?php
require __DIR__ . '/app/controller/JuegoController.php';
require __DIR__ . '/app/controller/LoginController.php';
require_once './app/helper/LoginHelper.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


//FALTA COMENTAR A DONDE VA CADA RUTEO

 //   login ->        LoginController->showLogin // Me muestra la pagina del login  // si la sesion esta iniciada, me deberia llevar a otro lugar -o home o show error: "la sesion ya esta iniciada"
 //   auth ->         LoginController->auth  //toma los datos del formulario y autentica



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
    case 'desarrolladores':
        $controller = new JuegoController();
        $controller->showDesarrolladores();
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
    case 'createDesarrollador':
        $controller = new JuegoController();
        $controller->createDesarrollador();
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
    case 'juego':
        $controller = new JuegoController();
        $controller->showJuego($_GET['id']);
        break;
    case 'creoDesarrollador':
        include './templates/createFormDesarrollador.phtml';
        break;
    default:
        include './templates/404.phtml';
        break;
}
