<?php

namespace App\Domain\Exceptions\Shared;

use Exception;
use App\Domain\ValueObjects\Shared\Password;

class InvalidPasswordException extends Exception
{
    public function __construct()
    {
        $message = sprintf(
            'A senha deve conter pelo menos %s caracteres!',
            Password::MIN_LENGTH
        );
        parent::__construct($message);
    }
}