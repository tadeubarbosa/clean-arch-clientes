<?php

namespace App\Domain\Services\Shared;

use App\Domain\Exceptions\Shared\SenhaIncorretaAoFazerLoginException;
use App\Domain\Exceptions\Shared\UsuarioNaoExisteByEmailException;
use App\Domain\Inputs\Shared\FazerLoginInputData;
use App\Domain\Repositories\Shared\FazerLoginRepository;

class DbFazerLoginService implements FazerLoginService
{
    /**
     * @param FazerLoginRepository $repository
     * @param FazerLoginInputData $usuario
     * @return bool
     * @throws SenhaIncorretaAoFazerLoginException
     * @throws UsuarioNaoExisteByEmailException
     */
    public function __invoke(FazerLoginRepository $repository, FazerLoginInputData $usuario): bool
    {
        $email = (string) $usuario->getEmail();
        $password = $usuario->getPassword();
        if (!($usuarioData = $repository->getSenhaUsuarioByEmail($email))) {
            throw new UsuarioNaoExisteByEmailException($email);
        }
        if (!$password->check($usuarioData['password'])) {
            throw new SenhaIncorretaAoFazerLoginException();
        }
    }
}