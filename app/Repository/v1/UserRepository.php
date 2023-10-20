<?php

namespace App\Repository\v1;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(User $user)
    {
        return $user->save();
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function findById(int $id)
    {
        return User::findOrFail($id);
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function lockForUpdate()
    {
        return User::lockForUpdate();
    }
}
