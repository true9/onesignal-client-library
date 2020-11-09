<?php

namespace true9\OSWrapper\Exceptions;

use Exception;

class IllegalArgumentException extends Exception
{
    public function __construct($message) {
        $this->message = $message;
    }
}