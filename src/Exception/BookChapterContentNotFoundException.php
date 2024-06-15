<?php

namespace App\Exception;

class BookChapterContentNotFoundException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('book chapter content not found');
    }
}
