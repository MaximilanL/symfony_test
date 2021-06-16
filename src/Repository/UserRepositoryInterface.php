<?php


namespace App\Repository;


interface UserRepositoryInterface
{
    /**
     * @param int $userId
     * @return object
     */
    public function getOne(int $userId): object;

    /**
     * @return array
     */
    public function getAll(): array;
}