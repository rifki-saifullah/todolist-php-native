<?php

require_once __DIR__ . "/Header.php";

$id_todo = htmlspecialchars($_GET['id']);

$todoService->removeTodolist($id_todo);

header("Location: ../Index.php");

