<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="./styles.css">
    <title>Document</title>
</head>

<body>
    <div class="signupFrm">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <h1 class="title">Contactanos</h1>

            <div class="inputContainer">
                <input type="text" class="input" placeholder="a" id="email" name="email" value="">
                <label for="" class="label">Email</label>
            </div>

            <div class="inputContainer">
                <input type="text" class="input" placeholder="a" id="name" name="name" value="">
                <label for="" class="label">Nombre</label>
            </div>

            <div class="inputContainer">
                <!-- <label for="message" class="label">Mensaje</label> -->
                <textarea placeholder="Mensaje..." class=" textarea" id="message" name="message"></textarea>
            </div>
            <input type="submit" class="submitBtn" value="Enviar mensaje" name="submit">
        </form>

        <?php if(!empty($errors)): ?>
        <div class="message-container error-container">
            <?php echo $errors?>
        </div>
        <?php elseif(!empty($sent)): ?>
        <div class="message-container success-container">
            <p>Enviado Correctamente</p>
        </div>
        <?php endif ?>

        <?php if(!empty($sent)): ?>
        <div class="data">
            <?php echo $data; ?>
        </div>
        <?php endif ?>

    </div>

    <!-- JavaScript -->
    <script src="script.js"></script>
</body>

</html>