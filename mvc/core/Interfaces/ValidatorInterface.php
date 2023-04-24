<?php

namespace Core\Interfaces;

interface ValidatorInterface
{
    public static function make($request, $rules, $messages, $attributes = []);

    public function passes();

    public function fails();
}
