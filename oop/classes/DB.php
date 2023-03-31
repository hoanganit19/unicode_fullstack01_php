<?php

class DB
{
    use QueryBuilder;
    //use Trait1, Trait2,..

    public function get()
    {
        return $this->table;
    }

    public function getTable()
    {
        return 'Table from DB';
    }
}
