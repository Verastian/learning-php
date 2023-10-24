<?php
class User
{
    // Properties
    public $id;
    public $name;
    public $email;
    public $password;
    public $rolId;
    public $createAt;

    // Constructor
    public function __construct($id, $name, $email, $password, $rolId, $createAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->rolId = $rolId;
        $this->createAt = $createAt;
    }

    // Setters and Getters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setRolId($rolId)
    {
        $this->createAt = $rolId;
    }

    public function getRolId()
    {
        return $this->rolId;
    }
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
    }

    public function getCreateAt()
    {
        return $this->createAt;
    }
}