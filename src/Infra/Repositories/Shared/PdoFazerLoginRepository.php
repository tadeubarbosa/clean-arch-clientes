<?php

namespace App\Infra\Repositories\Shared;

use App\Domain\Repositories\Shared\FazerLoginRepository;
use App\Infra\Exceptions\PDO\ErroAoBuscarValorNoBancoException;

class PdoFazerLoginRepository implements FazerLoginRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param string $email
     * @return array|null
     * @throws ErroAoBuscarValorNoBancoException
     */
    public function getSenhaUsuarioByEmail(string $email): ?array
    {
        $stmt = $this->pdo->prepare('SELECT `password` FROM `clientes` WHERE email = ?;');
        if (!$stmt->execute([$email])) {
            throw new ErroAoBuscarValorNoBancoException($stmt->errorInfo());
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}