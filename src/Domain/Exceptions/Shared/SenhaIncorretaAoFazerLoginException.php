<?php

namespace App\Domain\Exceptions\Shared;

use Exception;

class SenhaIncorretaAoFazerLoginException extends Exception
{
    public function __construct()
    {
        $message = 'A senha inserida não confere com a senha registrada no sistema!';
        parent::__construct($message);
    }
}