<?php

namespace Entity;

class Users
{
    private int $id;
    private string $username;
    private string $password;
    private ?string $passwordCheck;

    public function __construct( string $username, string $password, ?string $passwordCheck = null) 
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
    
    public function setUsername(string $username): void
    {
        $this->username = $username;        
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPasswordCheck(?string $passwordCheck): void
    {
        $this->passwordCheck = $passwordCheck;
    }

    public function getPasswordCheck(): ?string
    {
        return $this->passwordCheck;
    }
}