<?php

namespace App\Domain\Exceptions\Admin;

use Exception;

class ErroAoCadastrarAdminException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}