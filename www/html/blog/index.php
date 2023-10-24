<?php
$base_url = "/blog/";
include("src/views/layouts/header_front.view.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
    if ($_SERVER['REQUEST_URI'] == RUTA_FRONT || $_SERVER['REQUEST_URI'] == RUTA_ADMIN ) {
        include("src/views/components/carousel.view.php");
    }
    ?>
    <main class="container mx-auto pt-5">
        <?php
        echo $rv->render($seccion, $accion);
        ?>
    </main>
</body>
<?php include("src/views/layouts/footer.view.php") ?>

</html>