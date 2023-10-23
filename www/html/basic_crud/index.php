<?php
require_once 'src/libs/template.parser.lib.php';
require_once 'src/libs/router.control.lib.php';
require_once 'src/repositories/user/user.repository.php';
require_once 'src/services/user/user.service.php';
require_once 'src/models/user/user.model.php';

$rv = new RouteView();
$seccion = $_GET['pagina'] ?? 'home';
$accion = $_GET['accion'] ?? 'index';

$base_url = "/basic_crud/";
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $base_url . "assets/styles/css/bootstrap.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/styles/icons/bootstrap-icons.css">
    <title>Users manager</title>
</head>

<body>
    <header>
        <nav class="navbar bg-dark border-bottom border-body navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href='/basic_crud/home'>LOGO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href='/basic_crud/home'>Home</a></li>
                        <li class="nav-item"><a class="nav-link" href='/basic_crud/user'>Usuarios</a></li>
                        <li class="nav-item"><a class="nav-link" href='/basic_crud/contact'>Contacto</a></li>
                    </ul>
                    <button class="btn btn-dark" onclick={toogleTheme()}>
                        <i id="icon-theme" class="bi bi-sun"></i>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <main class="container mx-auto pt-5">
        <?php
        echo $rv->render($seccion, $accion);
        ?>
    </main>
    <script src="<?php echo $base_url; ?>assets/scripts/custom.js"></script>
    <script src="<?php echo $base_url; ?>assets/scripts/js/bootstrap.min.js"></script>
</body>

</html>