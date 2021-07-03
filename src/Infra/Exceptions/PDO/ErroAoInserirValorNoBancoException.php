<?php

namespace App\Infra\Exceptions\PDO;

use Exception;

class ErroAoInserirValorNoBancoException extends Exception
{
    public function __construct(array $errorInfo)
    {
        $message = sprintf(
            'Algo deu errado ao tentar inserir os valores no banco: %s.',
            $errorInfo[2]
        );
        parent::__construct($message);
    }
}