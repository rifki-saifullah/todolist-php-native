<?php

namespace Entity;

class Todo
{
    private int $id;
    private int $idUser;
    private ?string $todo;
    private string $createdAt;
    private ?string $dueDate;

    public function __construct(int $idUser = 0, ?string $todo = null, ?string $dueDate = null) 
    {
        $this->idUser = $idUser;
        $this->todo = $todo;
        $this->dueDate = $dueDate;
    }

    public function setId( int $id ): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setIdUser( int $idUser ): void
    {
        $this->idUser = $idUser;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function setTodo( ?string $todo ): void
    {
        $this->todo = $todo;
    }

    public function getTodo(): string
    {
        return $this->todo;
    }

    public function setCreatedAt( string $createdAt ): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setDueDate( ?string $dueDate ): void
    {
        $this->dueDate = $dueDate;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }
}