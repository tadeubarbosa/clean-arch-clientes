<?php

namespace App\Infra\Repositories\Clientes;

use App\Domain\Inputs\Clientes\CadastrarClienteInputData;
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
     * @param CadastrarClienteInputData $cliente
     * @return CadastrarClienteOutputData|null
     * @throws ErroAoInserirValorNoBancoException
     */
    public function execute(CadastrarClienteInputData $cliente): CadastrarClienteOutputData
    {
        $params = [
            'nome' => $cliente->getNome(),
            'email' => $cliente->getEmail(),
            'password' => $cliente->getPassword(),
        ];
        $stmt = $this->pdo->prepare('INSERT INTO `clientes` (`nome`, `email`, `password`) VALUES (?, ?, ?)');
        if (!$stmt->execute($params)) {
            throw new ErroAoInserirValorNoBancoException($stmt->errorInfo());
        }
        $lastInsertId = $stmt->lastInsertId();
        return new CadastrarClienteOutputData($lastInsertId);
    }
}