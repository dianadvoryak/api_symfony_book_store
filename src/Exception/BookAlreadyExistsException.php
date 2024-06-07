<?php

namespace App\Exception;

use Symfony\Component\HttpFoundation\Response;

class BookAlreadyExistsException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('book already exists');
    }
}
