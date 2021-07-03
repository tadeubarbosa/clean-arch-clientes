<?php

namespace App\Domain\Exceptions\Clientes;

use Exception;

class ClienteComEmailJaExistenteException extends Exception
{
    public function __construct(string $email)
    {
        $message = sprintf(
            'Já existe um cliente cadastrado com o email "%s"!',
            $email
        );
        parent::__construct($message);
    }
}