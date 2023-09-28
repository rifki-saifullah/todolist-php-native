<?php
session_start();

require_once __DIR__ . "/Header.php";

$username = htmlspecialchars($_GET['username']);

$findId = $todoService->findTodolistUsers($username);
$usersService->removeUser($findId);

session_destroy();

header("Location: ../View/Signup.php");
exit();