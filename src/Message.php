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



}