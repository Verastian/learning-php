<?php
// Obtén los detalles del usuario para precargar los valores
// print_r($currentUser);
?>

<form action="/router_parser/user/<?php echo $currentUser ? 'update' : 'create'; ?>" method="post">
    <?php if ($currentUser): ?>
        <input type="hidden" name="id" value="<?php echo $currentUser->getId(); ?>">
    <?php endif; ?>
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required
        value="<?php echo $currentUser ? $currentUser->getName() : ''; ?>"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required
        value="<?php echo $currentUser ? $currentUser->getEmail() : ''; ?>"><br><br>
    <?php if (!$currentUser): ?>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
    <?php endif; ?>
    <input type="submit" value="<?php echo $currentUser ? 'Actualizar Usuario' : 'Crear Usuario'; ?>">
</form>
<button onclick="javascript:history.back()">Volver</button>