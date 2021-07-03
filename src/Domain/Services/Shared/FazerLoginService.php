<?php

namespace App\Domain\Services\Shared;

use App\Domain\Inputs\Shared\FazerLoginInputData;
use App\Domain\Repositories\Shared\FazerLoginRepository;

interface FazerLoginService
{
    public function __invoke(FazerLoginRepository $repository, FazerLoginInputData $usuario): bool;
}