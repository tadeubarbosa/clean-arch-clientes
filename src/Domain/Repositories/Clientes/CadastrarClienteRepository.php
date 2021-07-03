<?php

namespace App\Domain\Repositories\Clientes;

use App\Domain\Exceptions\Clientes\ClienteComEmailJaExistenteException;
use App\Domain\Inputs\Clientes\CadastrarClienteOutputData;

interface CadastrarClienteRepository
{
    /**
     * @param array $data
     * @return CadastrarClienteOutputData|null
     * @throws ClienteComEmailJaExistenteException
     */
    public function execute(array $data): ?CadastrarClienteOutputData;
}