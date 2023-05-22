<?php

namespace Core;

use Core\Pagination;
use Core\Databases\Database;

class Model
{
    use Database;
    use Pagination;
    protected $table = null;
    protected $primaryKey = 'id';
    protected $fields = "*";
    protected $timestamps = true;

    public function paginate($sql, $limit)
    {
        return $this->getData($sql, $limit);
    }
}
