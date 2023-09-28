<?php
session_start();

require_once __DIR__ . "/Header.php";

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$passwordCheck = htmlspecialchars($_POST['password-check']);

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if($password === $passwordCheck) {
        if($usersService->addUser($username, $password, $passwordCheck)) {
            $_SESSION['login'] = true;
            $_SESSION['username_login'] = $username;
            header("Location: ../Index.php");
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Username sudah tersedia');
                window.location='../View/Signup.php';
            </script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Konfirmasi password salah');
            window.location='../View/Signup.php';
        </script>";
    }
}

if(isset($_SESSION['login'])){
    echo "<script type='text/javascript'>
                window.location='../View/Login.php';
            </script>";
} else {
    echo "<script type='text/javascript'>
                window.location='../View/Login.php';
            </script>";
}