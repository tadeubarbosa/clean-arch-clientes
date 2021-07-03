<?php

namespace App\Domain\Repositories\Clientes;

use App\Domain\Exceptions\Clientes\ClienteComEmailJaExistenteException;
use App\Domain\Inputs\Clientes\CadastrarClienteInputData;
use App\Domain\Inputs\Clientes\CadastrarClienteOutputData;

interface CadastrarClienteRepository
{
    /**
     * @param CadastrarClienteInputData $cliente
     * @return CadastrarClienteOutputData|null
     * @throws ClienteComEmailJaExistenteException
     */
    public function execute(CadastrarClienteInputData $cliente): CadastrarClienteOutputData;
}