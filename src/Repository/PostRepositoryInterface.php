<?php


namespace App\Repository;


interface PostRepositoryInterface
{
    /**
     * @return array
     */
    public function getAllPost(): array;

    /**
     * @return object
     */
    public function getOnePost(): object;
}