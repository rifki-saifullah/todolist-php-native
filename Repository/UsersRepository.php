<?php

namespace Repository;

use Entity\Users;

interface UsersRepository
{
    function add(Users $users): bool;
    function find(Users $users): bool;
    function remove(int $number);
}

class UsersRepositoryImpl implements UsersRepository
{
    public function __construct(
        private \PDO $connection,
    ){}

    public function add(Users $users): bool
    {   
        $sql = "SELECT username FROM users WHERE username = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$users->getUsername()]);
        
        if($row = $statement->fetch()) {
            return false;
        }

        $password = password_hash($users->getPassword(), PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(username, password) VALUES(?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$users->getUsername(), $password]);

        return true;
    }

    public function find(Users $users): bool
    {
        $sql = "SELECT password FROM users WHERE username = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$users->getUsername()]);
        $passwordHashing = "";
        foreach($statement as $row) {
            $passwordHashing = $row['password'];
        }
        if(password_verify($users->getPassword(), $passwordHashing)) {
            return true;
        } else {
            return false;
        }
    }

    public function remove(int $number)
    {
        $sql = "DELETE FROM todo WHERE id_user = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$number]);

        $sql = "DELETE FROM users WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$number]);
    }
}