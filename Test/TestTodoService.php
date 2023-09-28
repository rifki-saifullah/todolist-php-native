<?php

require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Entity/Users.php';
require_once __DIR__ . '/../Entity/Todo.php';
require_once __DIR__ . '/../Repository/TodoRepository.php';
require_once __DIR__ . '/../Service/TodoService.php';

use Config\Database;
use Entity\{Users, Todo};
use Repository\TodoRepositoryImpl;
use Service\TodoServiceImpl;

function TestAddTodolist()
{
    $connection = Database::getConnection();
    $todoRepository = new TodoRepositoryImpl($connection);
    $todoService = new TodoServiceImpl($todoRepository);

    $todoService->addTodolist(2, "coba", "2012-12-31T11:30:45");
}

function TestRemoveTodolist()
{
    $connection = Database::getConnection();
    $todoRepository = new TodoRepositoryImpl($connection);
    $todoService = new TodoServiceImpl($todoRepository);

    $todoService->removeTodolist(11);
}

function TestShowTodolist()
{
    $connection = Database::getConnection();
    $todoRepository = new TodoRepositoryImpl($connection);
    $todoService = new TodoServiceImpl($todoRepository);

    $todoService->showTodolist(1);
}

TestShowTodolist();