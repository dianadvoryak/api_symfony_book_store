<?php

namespace App\Exception;

use Symfony\Component\HttpFoundation\Response;

class SubscriberAlreadyExistsException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('subscriber already exists');
    }
}
