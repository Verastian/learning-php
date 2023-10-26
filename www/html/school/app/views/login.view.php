<?php include("layouts/header.view.php"); ?>
<div class="w-50 mx-auto pt-5">
    <form action="<?php print RUTA; ?>login/verify/" method="POST">
        <div class="form-group text-left">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" class="form-control"
                placeholder="Escribe el usuario (correo electrónico)" value="<?php if (isset($data["data"]["usuario"])) {
                    print $data["data"]["usuario"];
                } else {
                    print '';
                } ?>">
        </div>
        <div class="form-group text-left">
            <label for="clave">Clave:</label>
            <input type="password" name="clave" id="clave" class="form-control" placeholder="Escribe la clave de acceso"
                value="<?php if (isset($data["data"]["clave"])) {
                    print $data["data"]["clave"];
                } else {
                    print '';
                } ?>">
        </div>
        <div class="form-group text-left mt-2">
            <input type="submit" class="btn btn-success">
        </div>
        <div class="form-group text-left mt-2 mb-2">
            <input type="checkbox" name="recordar" id="recordar">
            <label for="recordar">Recordar</label>
        </div>
        <a href="<?php print RUTA; ?>login/forgot/">¿Olvidaste tu clave de acceso?</a>
    </form>
</div>
<?php include("layouts/footer.view.php"); ?>