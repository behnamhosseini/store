<?php

namespace App\Repository\v1;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data);

    public function update(User $user);

    public function delete(int $id);

    public function findById(int $id);

    public function getAll();

    public function lockForUpdate();

}
