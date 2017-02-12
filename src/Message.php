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



}