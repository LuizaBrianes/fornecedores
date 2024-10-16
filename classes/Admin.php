<?php

class Admin
{
    private $id;
    private $name;
    private $user;
    private $pass;

    public function __construct($id = null, $name = null, $user, $pass)
    {
        if (!empty($id)) {
            $this->setId($id);
        }
        if (!empty($name)) {
            $this->setName($name);
        }

        $this->setUser($user);
        $this->setPass($pass);
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        if (empty($name)) {
            throw new Exception("Informe seu nome");            
        }

        $this->name = $name;
    }


    public function setUser($user)
    {
        if (empty($user)) {
            throw new Exception("Informe seu usuário");            
        }

        $this->user = $user;
    }

    public function setPass($pass)
    {
        if (empty($pass)) {
            throw new Exception("Informe sua senha");            
        }

        $this->pass = $pass;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPass()
    {
        return $this->pass;
    }
}