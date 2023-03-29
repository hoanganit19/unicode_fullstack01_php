<?php

class Business extends Database
{
    protected $table = 'products';

    public function __construct($name)
    {
        parent::__construct();
        echo 'Construct from business <br/>';
        echo $name.'<br/>';
    }

    // public function query()
    // {
    //     parent::query();
    //     echo 'Query from business <br>';
    // }

    public function getQuery()
    {
        $this->query();
        echo $this->table.'<br/>';
    }
}