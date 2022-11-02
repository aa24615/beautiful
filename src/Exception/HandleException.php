<?php


namespace Zyan\Beautiful\Exception;


use Throwable;

class HandleException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = "Processing class cannot find name: {$message}";
        parent::__construct($message, $code, $previous);
    }
}