<?php

class User extends Model
{
    public function get()
    {
        return 'GET DATA';
    }

    public function first()
    {
        return 'First Data';
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
}
