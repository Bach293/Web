<?php

namespace App\Repositories;
use App\Models\PasswordReset;

interface PasswordResetRepository 
{
    public function findByEmail(string $email): ?PasswordReset;
    public function findByToken(string $token): ?PasswordReset;
    public function createToken(string $email, string $token): bool;
    public function updateToken(string $email, string $token): bool;
    public function deleteByEmail(string $email): bool;
}
