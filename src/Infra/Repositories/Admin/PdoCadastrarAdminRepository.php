<?php

namespace App\Infra\Repositories\Admin;

use App\Domain\Inputs\Admin\CadastrarAdminInputData;
use App\Domain\Inputs\Admin\CadastrarAdminOutputData;
use App\Domain\Repositories\Admin\CadastrarAdminRepository;
use App\Infra\Exceptions\PDO\ErroAoInserirValorNoBancoException;
use PDO;

class PdoCadastrarAdminRepository implements CadastrarAdminRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param CadastrarAdminInputData $admin
     * @return CadastrarAdminOutputData
     * @throws ErroAoInserirValorNoBancoException
     */
    public function execute(CadastrarAdminInputData $admin): CadastrarAdminOutputData
    {
        $params = [
            'nome' => $admin->getNome(),
            'email' => $admin->getEmail(),
            'password' => $admin->getPassword(),
        ];
        $stmt = $this->pdo->prepare('INSERT INTO `usuarios` (`nome`, `email`, `password`) VALUES (?, ?, ?)');
        if (!$stmt->execute($params)) {
            throw new ErroAoInserirValorNoBancoException($stmt->errorInfo());
        }
        $lastInsertId = $stmt->lastInsertId();
        return new CadastrarAdminOutputData($lastInsertId);
    }
}