<?php 

namespace User\Action;

trait CreatePasswordTrait
{
    protected function createPassword(string $password)
    {
        return \password_hash($password, PASSWORD_DEFAULT);
    }
}
