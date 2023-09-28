<?php
session_start();

require_once __DIR__ . "/Header.php";

$idUser = $todoService->findTodolistUsers($_SESSION['username_login']);

$idUser = htmlspecialchars($idUser);
$todo = htmlspecialchars($_POST['todo']);
$dueDate = htmlspecialchars($_POST['due_date']);

$todoService->addTodolist($idUser, $todo, $dueDate);

header("Location: ../Index.php");

