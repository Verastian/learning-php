<?php
class AuthController
{
    private $userRepository;

    public function __construct($userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function register()
    {
        include('src/views/auth/register.view.php');
    }
    public function createUser($name, $email, $password)
    {
        // Validar y sanear los valores de $_POST
        $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
        $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
        $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
        $confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'message' => 'El correo electrónico no es válido.'];
        }

        if (strlen($password) < 8) {
            return ['success' => false, 'message' => 'La contraseña debe tener al menos 8 caracteres.'];
        }

        if ($password !== $confirmPassword) {
            return ['success' => false, 'message' => 'Las contraseñas no coinciden.'];
        }
        $rolId = 2;
        $user = new User(null, $name, $email, $password, $rolId);
        $result = $this->userRepository->createUser($user);

        if ($result) {
            return ['success' => true, 'message' => 'Usuario creado exitosamente.'];
        } else {
            return ['success' => false, 'message' => 'Error al crear el usuario en la base de datos.'];
        }
    }
}
?>