<?php

class UserService
{
    private $userRepository;


    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function getUserById($id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function createUser($name, $email, $password)
    {
        $user = new User(null, $name, $email, $password);
        $result = $this->userRepository->createUser($user);
        if ($result) {
            return ['success' => true, 'message' => 'Usuario creado exitosamente.'];
        } else {
            return ['success' => false, 'message' => 'Error al crear el usuario en la base de datos.'];
        }
    }

    public function updateUser($id, $name, $email, $password)
    {
        $user = new User($id, $name, $email, $password);
        $updateResult = $this->userRepository->updateUser($user);

        if ($updateResult) {
            return ['success' => true, 'message' => 'Usuario actualizado exitosamente.'];
        } else {
            return ['success' => false, 'message' => 'Error al actualizar el usuario en la base de datos.'];
        }
    }

    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }


}