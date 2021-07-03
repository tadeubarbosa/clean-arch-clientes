<?php

namespace App\Infra\Exceptions\PDO;

use Exception;

class ErroAoBuscarValorNoBancoException extends Exception
{
    public function __construct(array $errorInfo)
    {
        $message = sprintf(
            'Algo deu errado ao tentar buscar os valores no banco: %s.',
            $errorInfo[2]
        );
        parent::__construct($message);
    }
}