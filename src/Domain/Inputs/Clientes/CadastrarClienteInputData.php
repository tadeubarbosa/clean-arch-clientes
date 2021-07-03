<?php

namespace App\Domain\Inputs\Clientes;

use App\Domain\Exceptions\Shared\InvalidEmailException;
use App\Domain\Exceptions\Shared\InvalidNomeException;
use App\Domain\Exceptions\Shared\InvalidPasswordException;

class CadastrarClienteInputData
{
    private Cliente $cliente;

    /**
     * @throws InvalidEmailException
     * @throws InvalidPasswordException
     * @throws InvalidNomeException
     */
    public function __construct(string $nome, string $email, string $password)
    {
        $this->cliente = new Cliente($nome, $email, $password);
    }

    public function all(): array
    {
        return [
            'nome' => (string) $this->cliente->getNome(),
            'email' => (string) $this->cliente->getEmail(),
            'password' => (string) $this->cliente->getPassword(),
        ];
    }

}