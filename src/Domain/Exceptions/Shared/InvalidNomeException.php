<?php

namespace App\Domain\Exceptions\Shared;

use Exception;
use App\Domain\ValueObjects\Shared\Nome;

class InvalidNomeException extends Exception
{
    public function __construct()
    {
        $message = sprintf(
            'O nome precisa conter no mínimo %s caracteres!',
            Nome::MIN_LENGTH
        );
        parent::__construct($message);
    }
}