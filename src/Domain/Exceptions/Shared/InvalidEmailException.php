<?php

namespace App\Domain\Exceptions\Shared;

use Exception;

class InvalidEmailException extends Exception
{
    public function __construct(string $email)
    {
        $message = "O email passado é inválido: {$email}.";
        parent::__construct($message);
    }
}