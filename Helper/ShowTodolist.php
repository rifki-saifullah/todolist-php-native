<?php
session_start();

require_once __DIR__ . "/Header.php";

$id_user = $todoService->findTodolistUsers($_SESSION['username_login']);
$todolist = $todoService->showTodolist($id_user);
