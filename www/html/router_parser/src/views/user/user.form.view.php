<?php
// Obtén los detalles del usuario para precargar los valores
// print_r($currentUser);
// if ((isset($data['errors']) && !empty($data['errors']))) {
//     print_r($data['errors']);
// }
if ((isset($errors) && !empty($errors))) {
    print_r($errors);
}
?>

<div class="">
    <div class="w-50 mx-auto border border-secondary p-5 rounded">
        <h1 class="pb-2">Crear usuario</h1>
        <form class="row g-3 needs-validation vstack gap-2" novalidate
            action="/router_parser/user/<?php echo $currentUser ? 'update' : 'create'; ?>" method="post">
            <!-- NAME -->
            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Nombre</label>
                <input type="text" name="name"
                    class="form-control <?php echo (isset($errors['name']) && !empty($errors['name'])) ? 'is-invalid' : ''; ?>"
                    id="validationCustom01" name="name"
                    value="<?php echo $currentUser ? $currentUser->getName() : ''; ?>" required>
                <div class="invalid-feedback">
                    <?php echo isset($errors['name']) ? $errors['name'] : 'Por favor ingrese un nombre válido.'; ?>
                </div>
            </div>
            <!-- EMAIL -->
            <div class="col-md-12">
                <label for="validationCustom02" class="form-label">Email</label>
                <input type="email" class="form-control" id="validationCustom02" name="email"
                    value="<?php echo $currentUser ? $currentUser->getEmail() : ''; ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <!-- PASSWORD -->
            <div class="col-md-12">
                <label for="validationCustomUsername" class="form-label">Contraseña</label>
                <div class="input-group has-validation">
                    <input type="password" class="form-control" id="validationCustomUsername" name="password"
                        aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-primary" type="button"
                        onclick="javascript:history.back()">Volver</button>
                    <button class="btn btn-primary" type="submit">
                        <?php echo $currentUser ? 'Actualizar Usuario' : 'Crear Usuario'; ?>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>