<h2>Este es un PHP para</h2>
<!-- <h2>Este es un PHP para {{USER}}</h2> -->

<!-- <ul>
    {{USERLIST}}
    </ul> -->
<?php
$templateParser = new TemplateParser();
?>
<ul>
    <?php foreach ($users as $user): ?>
        <li>
            Nombre:
            <?php echo $user->getName(); ?>, Email:
            <?php echo $user->getEmail(); ?> -

            <a href="/router_parser/user/show?id=<?php echo $user->getId(); ?>">Ver detalles</a> -
            <form method="post" action="index.php?route=delete-user">
                <input type="hidden" name="user_id" value="<?php echo $user->getId(); ?>">
                <button type="submit">Eliminar</button>
            </form>

        </li>

    <?php endforeach; ?>
</ul>
<button onclick="javascript:history.back()">Volver</button>
<form action="/router_parser/user/form">
    <button type="submit">Crear usuario</button>
</form>