<?php

namespace App\Domain\Services\Clientes;

use App\Domain\Inputs\Clientes\CadastrarClienteInputData;
use App\Domain\Inputs\Clientes\CadastrarClienteOutputData;
use App\Domain\Repositories\Clientes\CadastrarClienteRepository;

interface CadastrarClienteService
{
    public function __invoke(CadastrarClienteRepository $repository, CadastrarClienteInputData $cliente): CadastrarClienteOutputData;
}