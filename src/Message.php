<?php

/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 12.02.17
 * Time: 21:00
 */
class Message
{
    private $id;
    private $userId;
    private $text;
    private $receiver;
    private $creationDate;

    public function __construct()
    {
        $this->id = -1;
        $this->userId = -1;
        $this->text = '';
        $this->receiver = '';
        $this->creationDate = '';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function getReceiver()
    {
        return $this->receiver;
    }

    public function setReceiver(string $receiver)
    {
        $this->receiver = $receiver;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate(string $creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function saveToDB(Connection $connection)
    {
        if($this->id == -1) {
            $sql = "INSERT INTO product (id, userId, text, receiver, creationDate)
                    VALUES ('$this->id', '$this->userId', '$this->text', '$this->receiver', '$this->creationDate')";
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
                        userId='$this->userId',
                        text='$this->text',
                        receiver='$this->receiver',
                        creationDate='$this->creationDate'
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