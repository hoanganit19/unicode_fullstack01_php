<?php

interface AuthInterface extends AccessArray
{
    public const MSG = 'Unicode Academy';

    public function login();

    public function logout();

    public function register();
}
