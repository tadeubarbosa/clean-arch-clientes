<?php

namespace App\Domain\ValueObjects\Shared;

use App\Domain\Exceptions\Shared\InvalidNomeException;

class Nome
{
    public const MIN_LENGTH = 3;
    private string $nome;

    /**
     * Nome constructor.
     * @param string $nome
     * @throws InvalidNomeException
     */
    public function __construct(string $nome)
    {
        $this->setNome($nome);
    }

    /**
     * @param string $nome
     * @throws InvalidNomeException
     */
    private function setNome(string $nome): void
    {
        if (self::MIN_LENGTH > strlen($nome)) {
            throw new InvalidNomeException();
        }
        $this->nome = filter_var($nome, FILTER_SANITIZE_STRING);
    }
}