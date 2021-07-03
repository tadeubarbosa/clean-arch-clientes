<?php

namespace App\Domain\Exceptions\Shared;

use Exception;

class UsuarioNaoExisteByEmailException extends Exception
{
    public function __construct(string $email)
    {
        $message = sprintf(
            'O email "%s" não foi encontrado no sistema!',
            $email
        );
        parent::__construct($message);
    }
}