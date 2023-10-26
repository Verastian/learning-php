<?php include("layouts/header.view.php"); ?>
<div class="w-50 mx-auto pt-5">
    <form action="<?php print RUTA; ?>login/forgot/" method="POST">
        <div class="form-group text-left">
            <label for="user">* Correo:</label>
            <input type="text" name="user" id="user" class="form-control"
                placeholder="Escribe el user (correo electrónico)">
        </div>
        <div class="form-group text-left mt-2">
            <input type="submit" class="btn btn-success">
            <a href="<?php print RUTA; ?>" type="button" class="bt btn-info">Regresar</a>
        </div>
    </form>
</div>
<?php include("layouts/footer.view.php"); ?>