<?php

namespace App\Domain\Inputs\Clientes;

use App\Domain\Exceptions\Shared\InvalidEmailException;
use App\Domain\Exceptions\Shared\InvalidNomeException;
use App\Domain\Exceptions\Shared\InvalidPasswordException;
use App\Domain\ValueObjects\Shared\Email;
use App\Domain\ValueObjects\Shared\Nome;
use App\Domain\ValueObjects\Shared\Password;

class Cliente
{
    private Nome $nome;
    private Email $email;
    private Password $password;

    /**
     * CadastrarClienteInputData constructor.
     * @param string $nome
     * @param string $email
     * @param string $password
     * @throws InvalidEmailException
     * @throws InvalidNomeException
     * @throws InvalidPasswordException
     */
    public function __construct(string $nome, string $email, string $password)
    {
        $this->nome = new Nome($nome);
        $this->email = new Email($email);
        $this->password = new Password($password);
    }

    public function all(): array
    {
        return [
            'nome' => (string) $this->nome,
            'email' => (string) $this->email,
            'password' => (string) $this->password,
        ];
    }

    /**
     * @return Nome
     */
    public function getNome(): Nome
    {
        return $this->nome;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @return Password
     */
    public function getPassword(): Password
    {
        return $this->password;
    }
}