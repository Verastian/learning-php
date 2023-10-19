<?php
require_once 'src/libs/template.parser.lib.php';
require_once 'src/libs/router.control.lib.php';
require_once 'src/repositories/user/user.repository.php';
require_once 'src/services/user/user.service.php';
require_once 'src/models/user/user.model.php';
// require_once 'src/controllers/user/user.controller.php';
$rv = new RouteView();
$seccion = $_GET['pagina'] ?? 'home';
$accion = $_GET['accion'] ?? 'index';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Parser</title>
</head>

<body>
    <header>
        <h1>LOGO</h1>
        <nav>
            <ul>
                <li><a href='/router_parser/home'>Home</a></li>
                <li><a href='/router_parser/user'>Usuarios</a></li>
                <li><a href='/router_parser/contact'>Contacto</a></li>
            </ul>
        </nav>
    </header>
    <?php
    echo $rv->render($seccion, $accion);
    ?>
</body>

</html>