<?php

namespace Service;

use Entity\Todo;
use Repository\TodoRepository;

interface TodoService
{
    public function showTodolist(int $number);
    public function addTodolist(int $idUser, string $todo , string $dueDate): void;
    public function removeTodolist(int $number): void;
    public function findTodolistUsers(string $username): int;
}

class TodoServiceImpl implements TodoService
{
    public function __construct(
        private TodoRepository $todoRepository,
    ){}

    public function showTodolist(int $number): array
    {
        $todolist = $this->todoRepository->findAll($number);
        return $todolist;
    }

    public function addTodolist(int $idUser, string $todo , string $dueDate): void
    {
        $todo = new Todo($idUser, $todo, $dueDate);
        $this->todoRepository->insert($todo);
    }

    public function removeTodolist(int $number): void
    {
        $this->todoRepository->remove($number);
    }

    public function findTodolistUsers(string $username): int
    {
         return $this->todoRepository->findId($username);
    }
}