<?php
class User{
    public $id;
    public $name;
    public $password;
    public $email;
    public $image;
    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->name, 'string');
        settype($this->password, 'string');
        settype($this->email, 'string');
        settype($this->image, 'string');
    }
}