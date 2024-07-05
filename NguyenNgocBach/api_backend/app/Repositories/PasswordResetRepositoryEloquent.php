<?php 

namespace App\Repositories;

use App\Models\PasswordReset;
use Carbon\Carbon;

class PasswordResetRepositoryEloquent implements PasswordResetRepository
{
    public function findByEmail(string $email): ?PasswordReset
    {
        return PasswordReset::where('email', $email)->first();
    }

    public function findByToken(string $token): ?PasswordReset
    {
        return PasswordReset::where('token', $token)->first();
    }

    public function createToken(string $email, string $token): bool
    {
        return PasswordReset::create([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]) ? true : false;
    }

    public function updateToken(string $email, string $token): bool
    {
        return PasswordReset::where('email', $email)->update([
            'token' => $token,
            'created_at' => Carbon::now(),
        ]) > 0;
    }

    public function deleteByEmail(string $email): bool
    {
        return PasswordReset::where('email', $email)->delete() > 0;
    }
}
