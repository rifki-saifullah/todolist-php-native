<?php

session_start();

if( isset($_SESSION["login"]) ) {
	header("Location: ./../Index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../public/css/login-signup.css">
</head>
<body>
    <header>
        <h1>Todolist App</h1>
    </header>
    <main>
        <h2>Sign Up</h2>
        <form action="./../Helper/Register.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <label for="password-check">Confirm Password</label>
            <input type="password" name="password-check" id="password-check" required>
            <button type="submit" name="submit">Submit</button>
        </form>
        <p>Already have an acccount ?
            <a href="Login.php">Login</a>
            Here
        </p>
    </main>
</body>
</html>