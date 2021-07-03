<?php

namespace App\Infra\Repositories\Clientes;

use App\Domain\Inputs\Clientes\CadastrarClienteOutputData;
use App\Domain\Repositories\Clientes\CadastrarClienteRepository;
use App\Infra\Exceptions\PDO\ErroAoInserirValorNoBancoException;
use PDO;

class PdoCadastrarClienteRepository implements CadastrarClienteRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param string $nome
     * @param string $email
     * @param string $password
     * @return CadastrarClienteOutputData|null
     * @throws ErroAoInserirValorNoBancoException
     */
    public function execute(string $nome, string $email, string $password): CadastrarClienteOutputData
    {
        $stmt = $this->pdo->prepare('INSERT INTO `clientes` (`nome`, `email`, `password`) VALUES (?, ?, ?)');
        if (!$stmt->execute([$nome, $email, $password])) {
            throw new ErroAoInserirValorNoBancoException($stmt->errorInfo());
        }
        $lastInsertId = $stmt->lastInsertId();
        return new CadastrarClienteOutputData($lastInsertId);
    }
}