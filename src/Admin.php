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

    public function saveToDB(Connection $connection)
    {
        if($this->id == -1) {
            $sql = "INSERT INTO admin (id, name, email, password)
                    VALUES ('$this->id', '$this->name', '$this->email', '$this->password')";
            $result = $connection->query($sql);

            if($result == true) {
                $this->id = $connection->insert_id;
                return true;
            } else {
                return false;
            }
        } else {
            $sql = "UPDATE product 
                    SET id='$this->id',
                        name='$this->name',
                        email='$this->email',
                        password='$this->password'
                    WHERE id=$this->id";
            $result = $connection->query($sql);

            if($result == true) {
                return true;
            } else {
                return false;
            }
        }
    }

}