<?php

namespace App\Domain\Inputs\Shared;

use App\Domain\Exceptions\Shared\InvalidEmailException;
use App\Domain\Exceptions\Shared\InvalidPasswordException;
use App\Domain\ValueObjects\Shared\Email;
use App\Domain\ValueObjects\Shared\Password;

final class FazerLoginInputData
{
    private Email $email;
    private Password $password;

    /**
     * FazerLoginInputData constructor.
     * @param string $email
     * @param string $password
     * @throws InvalidEmailException
     * @throws InvalidPasswordException
     */
    public function __construct(string $email, string $password)
    {
        $this->email = new Email($email);
        $this->password = new Password($password);
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @return Password
     */
    public function getPassword(): Password
    {
        return $this->password;
    }

    /**
     * @param string $hash
     * @return bool
     */
    public function checkPasswordIsValidByHash(string $hash): bool
    {
        return $this->password->check($hash);
    }
}