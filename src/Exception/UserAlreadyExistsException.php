<?php

namespace App\Exception;

use Symfony\Component\HttpFoundation\Response;

class UserAlreadyExistsException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('user already exists');
    }
}
