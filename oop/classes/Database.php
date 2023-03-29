<?php

class Database
{
    protected $table = 'users';

    public function __construct()
    {
        echo 'construct from database <br/>';
    }

    public function query()
    {
        echo 'Query from database <br/>';
    }

    public function getTable()
    {
        //$this->getQuery();
        echo $this->table.'<br/>';
    }
}

//Khi bị override => Giá trị cũ sẽ mất
