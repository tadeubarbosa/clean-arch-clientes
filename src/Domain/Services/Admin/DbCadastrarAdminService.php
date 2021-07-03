<?php

namespace App\Domain\Services\Admin;

use App\Domain\Exceptions\Admin\ErroAoCadastrarAdminException;
use App\Domain\Inputs\Admin\CadastrarAdminInputData;
use App\Domain\Inputs\Admin\CadastrarAdminOutputData;
use App\Domain\Repositories\Admin\CadastrarAdminRepository;

class DbCadastrarAdminService implements CadastrarAdminService
{
    /**
     * @param CadastrarAdminRepository $repository
     * @param CadastrarAdminInputData $admin
     * @return CadastrarAdminOutputData
     * @throws ErroAoCadastrarAdminException
     */
    public function __invoke(CadastrarAdminRepository $repository, CadastrarAdminInputData $admin): CadastrarAdminOutputData
    {
        if ($output = $repository->execute($admin)) {
            return $output;
        }
        $message = 'Algo deu errado ao cadastrar o cliente! Tente novamente mais tarde!';
        throw new ErroAoCadastrarAdminException($message);
    }
}