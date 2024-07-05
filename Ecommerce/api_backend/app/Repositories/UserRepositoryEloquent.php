<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    public function model()
    {
        return User::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function createUser(array $data): ?User
    {
        return $this->create($data);
    }

    public function loginUser(array $data): ?User
    {
        $user = $this->model->where('email', $data['email'])->first();
        if ($user && Hash::check($data['password'], $user->password)) {
            return $user;
        }
        return null;
    }

    public function updateUser($id, array $data): bool
    {
        $user = $this->find($id);
        if ($user) {
            $user->update($data);
            return true;
        }
        return false;
    }

    public function findUserByEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }

    public function resetPassword(string $email, string $hashedPassword): bool
    {
        $user = $this->model->where('email', $email)->first();
        if ($user) {
            $user->password = $hashedPassword;
            return $user->save();
        }
        return false;
    }
}
