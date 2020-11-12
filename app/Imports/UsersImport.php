<?php

namespace App\Imports;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, SkipsOnError, SkipsOnFailure, WithValidation, WithHeadingRow
{
    use Importable, SkipsErrors, SkipsFailures;

    /**
     * @param array $row
     *
     * @return Model|null
     */
    public function model(array $row)
    {
        $user = User::create([
            'email' => $row['email'],
            'name' => $row['name'],
            'password' => Hash::make(config('app.default_password')),
        ]);
        $user->assignRole('writer');
        $user->save();
        // Adding to send email verification is generally a bad idea due to:
        // 1. Pricing constraints
        // 2. Potential spam
        // It is generally better to let users go to settings and verify their email instead.
        // $user->sendEmailVerificationNotification();
        return $user;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|unique:users,email',
            'name' => 'required',
        ];
    }
}
