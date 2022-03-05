<?php


class Product
{
    public $id ;
    public $name;
    public $image;
    public $description;
    public $category_id;
    public $category;

    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->category_id, 'integer');
    }
}