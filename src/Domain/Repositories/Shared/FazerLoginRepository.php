<?php

namespace App\Domain\Repositories\Shared;

interface FazerLoginRepository
{
    public function getSenhaUsuarioByEmail(string $email): ?array;
}