<?php

trait QueryBuilder
{
    use TestTrait;
    private $table = null;
    public function table($table)
    {
        $this->table = $table;
    }

    public function getTable()
    {
        return 'Table from Trait <br/>';
    }
}
