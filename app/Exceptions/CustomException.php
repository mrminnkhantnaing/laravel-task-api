<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    public function __construct($message = 'Custom Exception Message', $code = 400)
    {
        parent::__construct($message, $code);
    }
}
