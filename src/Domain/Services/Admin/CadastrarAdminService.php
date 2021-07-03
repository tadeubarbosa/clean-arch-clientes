<?php

namespace App\Domain\Services\Admin;

use App\Domain\Inputs\Admin\CadastrarAdminInputData;
use App\Domain\Inputs\Admin\CadastrarAdminOutputData;
use App\Domain\Repositories\Admin\CadastrarAdminRepository;

interface CadastrarAdminService
{
    public function __invoke(CadastrarAdminRepository $repository, CadastrarAdminInputData $admin): CadastrarAdminOutputData;
}