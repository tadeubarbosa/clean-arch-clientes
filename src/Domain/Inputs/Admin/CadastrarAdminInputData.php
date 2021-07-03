<?php

namespace App\Domain\Inputs\Admin;

class CadastrarAdminInputData
{
    private string $nome;
    private string $email;
    private string $password;

    public function __construct(string $nome, string $email, string $password)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

}