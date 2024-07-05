<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;
use App\Models\User;

interface UserRepository extends RepositoryInterface
{
    public function createUser(array $data): ?User;
    public function loginUser(array $data): ?User;
    public function updateUser($id, array $data): bool;
    public function findUserByEmail(string $email): ?User;
    public function resetPassword(string $email, string $hashedPassword): bool;
}
