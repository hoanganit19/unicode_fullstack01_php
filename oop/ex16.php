<?php

//DB::table('users')->get();
//DB::where('users')->table('users')->get();
//DB::get();
//User::all();
//User::where()->orderBy->get();
//User::where()->orderBy->paginate();

trait DBExecute
{
    private $table = null;
    private function get()
    {
        echo $this->table;
        return 'GET Data';
    }

    private function table($table)
    {
        $this->table = $table;
        return $this;
    }
};

class DB
{
    use DBExecute;
    public function __call($method, $args)
    {
        return call_user_func_array([$this, $method], $args);
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array([new self(), $method], $args);
    }
}

echo DB::table('users')->get();