<?php

namespace App\Domain\ValueObjects\Shared;

use App\Domain\Exceptions\Shared\InvalidPasswordException;

class Password
{
    public const MIN_LENGTH = 8;
    private string $password;

    /**
     * Password constructor.
     * @param string $password
     * @throws InvalidPasswordException
     */
    public function __construct(string $password)
    {
        $this->setPassword($password);
    }

    /**
     * @param string $password
     * @throws InvalidPasswordException
     */
    private function setPassword(string $password): void
    {
        if (self::MIN_LENGTH > strlen($password)) {
            throw new InvalidPasswordException();
        }
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        $this->password = $this->hash($password);
    }

    private function hash(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function check(string $hash): bool
    {
        return password_verify($this->password, $hash);
    }

    public function __toString(): string
    {
        return $this->password;
    }
}