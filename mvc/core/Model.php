<?php

namespace Core;

use Core\Databases\Database;

class Model
{
    use Database;
    protected $table = null;
    protected $primaryKey = 'id';
    protected $fields = "*";
}