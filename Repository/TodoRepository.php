<?php

namespace Repository;

use Entity\Todo;

interface TodoRepository
{
    function insert(Todo $todo): void;
    function remove(int $id): bool;
    function findAll(int $id_user): array;
    function findId(string $username): int;
}

class TodoRepositoryImpl implements TodoRepository
{
    public function __construct(
        private \PDO $connection,
    ){}

    public function insert(Todo $todo): void
    {
        $sql = "INSERT INTO todo(id_user, todo, due_date) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([ $todo->getIdUser(), $todo->getTodo(), $todo->getDueDate()]);
    }

    public function remove(int $id): bool
    {
        $sql = "SELECT id FROM todo WHERE id = ?";
        $statement = $this->connection->prepare($sql); 
        $statement->execute([$id]);

        if($statement->fetch()) {
            $sql = "DELETE FROM todo WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$id]);
            return true;
        } else {
            return false;
        }
    }

    public function findAll(int $idUser): array
    {
        $sql = "SELECT * FROM todo WHERE id_user = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$idUser]);

        $result = [];

        foreach ($statement as $row) {
            $todolist = new Todo();
            $todolist->setId($row['id']);
            $todolist->setIdUser($row['id_user']);
            $todolist->setTodo($row['todo']);
            $todolist->setCreatedAt($row['created_at']);
            $todolist->setDueDate($row['due_date']);

            $result[] = $todolist;
        }
        
        return $result;
    }

    function findId(string $username): int
    {
        $sql = "SELECT id FROM users WHERE username = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$username]);
        $id;
        foreach($statement as $row) {
            $id = $row['id'];
        }
        return $id;
    }
}