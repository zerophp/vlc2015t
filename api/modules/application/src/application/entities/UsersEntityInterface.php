<?php
namespace application\entities;

interface UsersEntityInterface
{
    public function extract($obj);
    public function hydrate($arr);
}