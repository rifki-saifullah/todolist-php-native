<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: ./View/Login.php");
	exit();
}

require_once __DIR__ . '/Helper/ShowTodolist.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist App</title>
    <link rel="stylesheet" href="./public/css/index.css">
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="./Helper/Logout.php">Logout</a>
            </li>
            <li>
                <a href="./Helper/DeleteAccount.php?username=<?= $_SESSION['username_login']; ?>">Delete Account</a>
            </li>
            <li>
                <p><?= $_SESSION['username_login']; ?></p>
            </li>
        </ul>
    </nav>
    <header>
        <h1>My Todolist</h1>
        <h2><?= date("l") . ', '.  date("Y/m/d") ?></h2>
    </header>
    <main>
        <?php foreach($todolist as $number => $value) : ?>
            <div class='todolist'>
                <h3><?= $value->getTodo(); ?></h3>
                <div class='date'>
                    <p>Due Date : <?= $value->getCreatedAt(); ?></p>
                    <p>Created at : <?= $value->getDueDate(); ?></p>
                </div>
                <a href='./Helper/DeleteTodolist.php?id=<?= $value->getId(); ?>' class='finish'>Ok</a>
            </div>
        <?php endforeach; ?>
    </main>
    <div class="add-todo-button">+</div>
    <div class="input-todo">
        <div class="input-table">
            <h2>Input Todo</h2>
            <form action="./Helper/InputTodolist.php" method="post">
                <label for="todo">Todo</label>
                <input type="text" name="todo" id="todo">
                <label for="due_date">Date (Please, enter the correct date)</label>
                <input type="datetime-local" name="due_date" id="due_date">
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
    <script src="./public/js/toggle.js"></script>
</body>
</html>