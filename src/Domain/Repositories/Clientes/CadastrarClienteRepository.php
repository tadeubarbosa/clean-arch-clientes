<?php

namespace App\Domain\Repositories\Clientes;

use App\Domain\Exceptions\Clientes\ClienteComEmailJaExistenteException;
use App\Domain\Inputs\Clientes\CadastrarClienteOutputData;
use App\Domain\ValueObjects\Shared\Email;
use App\Domain\ValueObjects\Shared\Nome;
use App\Domain\ValueObjects\Shared\Password;

interface CadastrarClienteRepository
{
    /**
     * @param Nome $nome
     * @param Email $email
     * @param Password $password
     * @return CadastrarClienteOutputData|null
     * @throws ClienteComEmailJaExistenteException
     */
    public function execute(Nome $nome, Email $email, Password $password): ?CadastrarClienteOutputData;
}