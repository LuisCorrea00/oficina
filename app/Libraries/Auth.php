<?php

namespace App\Libraries;

class Auth
{
    public function check()
    {
        return session()->has('user');
    }
}
