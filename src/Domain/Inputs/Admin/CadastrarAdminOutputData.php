<?php

namespace App\Domain\Inputs\Admin;

class CadastrarAdminOutputData
{
    private int $adminId;

    public function __construct(int $adminId)
    {
        $this->adminId = $adminId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->adminId;
    }

}