<?php

namespace App\Domain\ValueObjects\Shared;

use App\Domain\Exceptions\Shared\InvalidEmailException;

class Email
{
    private string $email;

    /**
     * Email constructor.
     * @param string $email
     * @throws InvalidEmailException
     */
    public function __construct(string $email)
    {
        $this->setEmail($email);
    }

    /**
     * @param string $email
     * @throws InvalidEmailException
     */
    private function setEmail(string $email): void
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException($email);
        }
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public function __toString(): string
    {
        return $this->email;
    }
}