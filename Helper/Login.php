<?php
session_start();

require_once __DIR__ . "/Header.php";

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if($usersService->findUser($username, $password)) {
        $_SESSION['login'] = true;
        $_SESSION['username_login'] = $username;
        header("Location: ../Index.php");
    } else {
        echo "<script type='text/javascript'>alert('Username atau Password salah');
                window.location='../View/Login.php';
            </script>";
    }
}

if(isset($_SESSION['login'])){
    echo "<script type='text/javascript'>alert('Username atau Password salah');
                window.location='./../Index.php';
            </script>";
} else {
    echo "<script type='text/javascript'>alert('Username atau Password salah');
                window.location='../View/Login.php';
            </script>";
}


