<?php

require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Entity/Users.php';
require_once __DIR__ . '/../Entity/Todo.php';
require_once __DIR__ . '/../Repository/UsersRepository.php';
require_once __DIR__ . '/../Service/UsersService.php';
require_once __DIR__ . '/../Repository/TodoRepository.php';
require_once __DIR__ . '/../Service/TodoService.php';

use Config\Database;
use Entity\{Users, Todo};
use Repository\{UsersRepositoryImpl, TodoRepositoryImpl};
use Service\{UsersServiceImpl, TodoServiceImpl};

$connection = Config\Database::getConnection();

$todoRepository = new TodoRepositoryImpl($connection);
$todoService = new TodoServiceImpl($todoRepository);

$usersRepository = new UsersRepositoryImpl($connection);
$usersService = new UsersServiceImpl($usersRepository);