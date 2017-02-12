<?php

/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 12.02.17
 * Time: 19:39
 */
class Admin
{
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct()
    {
        $this->id = -1;
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }



}