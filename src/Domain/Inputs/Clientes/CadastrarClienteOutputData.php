<?php

namespace App\Domain\Inputs\Clientes;

final class CadastrarClienteOutputData
{
    private int $clienteId;

    public function __construct(int $clienteId)
    {
        $this->clienteId = $clienteId;
    }

    public function getId(): int
    {
        return $this->clienteId;
    }
}