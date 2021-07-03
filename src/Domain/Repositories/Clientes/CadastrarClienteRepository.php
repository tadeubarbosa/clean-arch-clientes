<?php

namespace App\Domain\Repositories\Clientes;

use App\Domain\Exceptions\Clientes\ClienteComEmailJaExistenteException;
use App\Domain\Inputs\Clientes\CadastrarClienteOutputData;

interface CadastrarClienteRepository
{
    /**
     * @param string $nome
     * @param string $email
     * @param string $password
     * @return CadastrarClienteOutputData|null
     * @throws ClienteComEmailJaExistenteException
     */
    public function execute(string $nome, string $email, string $password): ?CadastrarClienteOutputData;
}