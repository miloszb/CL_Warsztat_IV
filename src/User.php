<?php
class User
{
    protected $id;
    protected $name;
    protected $surname;
    protected $email;
    protected $password;
    protected $errors;
    
    public function __construct($name='', $surname='', $email='', $password='')
    {
        $this->id = -1;
        $this->setName($name);
        $this->setSurname($surname);
        $this->setEmail($email);
        $this->setPassword($password);
        $errors = [];
    }
    public function get($id)
    {
        $db = new Connection();
        $sql = 'SELECT * FROM user WHERE id=' . $id;
        try {
            $result = $db->query($sql);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $db->close();
        }
        $row = $result->fetch_assoc();
        if($row['id']){
            $this->id = ($row['id']);
            $this->setName($row['name']);
            $this->setSurname($row['surname']);
            $this->setEmail($row['email']);
            return $this;
        }
        return false;
        $db->close();
    }
    public function save()
    {
        $db = new Connection();
        if ($this->id == -1) {
            $hashPass = password_hash($this->password, PASSWORD_BCRYPT);
            $sql = sprintf(
                    'INSERT INTO user (id, name, surname, email, password) '
                        . 'VALUES(NULL, "%s", "%s", "%s", "%s")',
                    $this->name,
                    $this->surname,
                    $this->email,
                    $hashPass
            );
            try {
                $db->query($sql);
            } catch (Exception $ex) {
                $this->errors[] = $ex->getMessage();
                $db->close();
            }
            $this->id = $db->getInsertId();
            return $this->get($this->id);
        } else {
            $hashPass = password_hash($this->password, PASSWORD_BCRYPT);
            $sql = sprintf(
                'UPDATE user SET name = "%s", surname = "%s", ' 
                        . 'email = "%s", password = "%s" '
                        . 'WHERE id = %s',
                $this->name,
                $this->surname,
                $this->email,
                $hashPass,
                $this->id
            );
            try {
                $db->query($sql);
            } catch (Exception $ex) {
                echo $ex->getMessage();
                $db->close();
            }
            return $this;
        }
        $db->close();
    }
    public static function login($email, $password)
    {
        $db = new Connection();
        $sql = sprintf(
                'SELECT id, password FROM user WHERE email="%s"',
                $email
        );
        try {
            $result = $db->query($sql);
        } catch (Exception $ex) {
            $this->errors[] = $ex->getMessage();
            $db->close();
        }
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $hashPass = $row['password'];
        if (password_verify($password, $hashPass)) {
            $loggedUser = new User();
            return $loggedUser->get($id);
        } else {
            return false;
        }
        $db->close();
    }
    public function getId()
    {
        return $this->id;
    }
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getErrors()
    {
        return $this->errors;
    }
}
