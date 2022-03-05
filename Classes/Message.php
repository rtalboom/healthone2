<?php


class Message
{
    public $id ;
    public $email;
    public $message;
    public $time;

    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->email, 'string');
        settype($this->message, 'string');
        settype($this->time, 'string');
    }
}