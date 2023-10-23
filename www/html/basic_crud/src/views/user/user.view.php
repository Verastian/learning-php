<h2>Adminstrar usuarios</h2>
<!-- <h2>Este es un PHP para {{USER}}</h2> -->

<!-- <ul>
    {{USERLIST}}
    </ul> -->
<?php
$templateParser = new TemplateParser();
?>

<div class="table-responsive-sm caption-top">
    <table class="table">
        <caption>List of users</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <th scope="row">
                        <?php echo $user->getId(); ?>
                    </th>
                    <td>
                        <?php echo $user->getName(); ?>
                    </td>
                    <td>
                        <?php echo $user->getEmail(); ?>
                    </td>
                    <td>
                        <a href="/basic_crud/user/show?id=<?php echo $user->getId(); ?>">Ver detalles</a>
                    </td>
                    <td>
                        <form method="post" action="/basic_crud/user/delete">
                            <input type="hidden" name="user_id" value="<?php echo $user->getId(); ?>">
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="/basic_crud/user/form">
                            <input type="hidden" name="user_id" value="<?php echo $user->getId(); ?>">
                            <button class="btn btn-warning btn-sm" type="submit">Editar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-between">

    <button class="btn btn-outline-primary" type="button" onclick="javascript:history.back()">Volver</button>
    <form action="/basic_crud/user/form">
        <button class="btn btn-primary" type="submit">Crear usuario</button>
    </form>
</div>