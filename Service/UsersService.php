<?php

namespace Service;

use Entity\Users;
use Repository\UsersRepository;

interface UsersService
{
    function addUser(string $username, string $password, string $passwordCheck): bool;
    function findUser(string $username, string $password): bool;
    function removeUser(int $id);
}

class UsersServiceImpl implements UsersService
{
    public function __construct(
        private UsersRepository $usersRepository,
    ){}

    function addUser(string $username, string $password, string $passwordCheck): bool
    {
        $account = new Users($username, $password, $passwordCheck);
        if($this->usersRepository->add($account)) {
            return true;
        } else {
            return false;
        }
    }

    function findUser(string $username, string $password): bool
    {
        $account = new Users($username, $password);
        if($this->usersRepository->find($account)) {
            return true;
        } else {
            return false;
        }
    }

    function removeUser(int $id)
    {
        $this->usersRepository->remove($id);
    }
    

}