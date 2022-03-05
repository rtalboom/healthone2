<?php


class Review
{
    public $id;
    public $name;
    public $stars;
    public $review;
    public $postdate;
    public $user_id;
    public $product_id;


    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->user_id, 'integer');
        settype($this->name, 'string');
        settype($this->product_id, 'integer');
        settype($this->stars, 'integer');
    }
}
