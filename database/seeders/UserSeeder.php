<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\JabatanEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JabatanEnum::getCollection()->each(function (string $role) {
            $user = User::where('jabatan', $role)
                ->where('email', sprintf('%s@example.com', Str::snake($role)))
                ->first();

            if (!$user?->id) {
                User::factory()->create([
                    'jabatan' => $role,
                    'email' => sprintf('%s@example.com', Str::snake($role)),
                ]);
            }
        });
    }
}
