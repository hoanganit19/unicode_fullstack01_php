<?php

abstract class Model
{
    protected $message = null;

    public function getMessage()
    {
        return $this->message;
    }

    abstract public function get();

    abstract public function first();

    abstract public function setMessage($message);
}

/*
Validate form

abstract class Request{

    abstract public function rules();

    abstract public function messages();

    public function validate(){

    }
}

class ProductController extends Request{

    public function messages(){

    }


    public function rules(){

    }

    public function add(){
        $this->validate();
    }
}
*/
