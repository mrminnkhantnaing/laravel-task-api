<?php

namespace App\Exceptions;

use App\Services\ResponseService;
use Exception;

class CustomException extends Exception
{
    protected $message = 'Internal Server Error';
    protected $code = 500;

    public function __construct($message = null, $code = null, Exception $previous = null)
    {
        if ($message !== null) {
            $this->message = $message;
        }

        if ($code !== null) {
            $this->code = $code;
        }

        parent::__construct($this->message, $this->code, $previous);
    }

    public function render($request)
    {
        return ResponseService::error($this->getMessage(), $this->getCode());
    }
}
