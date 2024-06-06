<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Validator as CustomAssert;

class User
{
    protected string $username;

    #[Assert\Sequentially([
      new Assert\Email,
      new CustomAssert\HasValidDomain(mode: "loose", forbiddenDomain: "gmail.com"),
    ])]
    protected string $email;

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}