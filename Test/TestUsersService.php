<?php

require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Entity/Users.php';
require_once __DIR__ . '/../Repository/UsersRepository.php';
require_once __DIR__ . '/../Service/UsersService.php';

use Config\Database;
use Entity\Users;
use Repository\UsersRepositoryImpl;
use Service\UsersServiceImpl;

function TestAddUser()
{
    $connection = Database::getConnection();
    $usersRepository = new UsersRepositoryImpl($connection);
    $usersService = new UsersServiceImpl($usersRepository);
    $usersService->addUser("admin", "123");
}

function TestRemoveUser()
{
    $connection = Database::getConnection();
    $usersRepository = new UsersRepositoryImpl($connection);
    $usersService = new UsersServiceImpl($usersRepository);
    $usersService->removeUser(3);
}

function TestFindUser()
{
    $connection = Database::getConnection();
    $usersRepository = new UsersRepositoryImpl($connection);
    $usersService = new UsersServiceImpl($usersRepository);
    $usersService->findUser("admin", "123");
}

TestFindUser();