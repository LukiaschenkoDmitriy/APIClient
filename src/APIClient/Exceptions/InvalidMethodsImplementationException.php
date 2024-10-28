<?php declare(strict_types=1);

namespace Dmytrii\ClientLibrary\APIClient\Exceptions;

class InvalidMethodsImplementationException extends \Exception {
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}