<?php

namespace App\Domain\Repositories\Admin;

use App\Domain\Inputs\Admin\CadastrarAdminInputData;
use App\Domain\Inputs\Admin\CadastrarAdminOutputData;

interface CadastrarAdminRepository
{
    public function execute(CadastrarAdminInputData $admin): CadastrarAdminOutputData;
}