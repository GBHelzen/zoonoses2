<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::firstOrCreate(['name' => 'administrador', 'guard_name' => 'web']);

        $superAdmin = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);

        $ong = Role::firstOrCreate(['name' => 'ong-admin', 'guard_name' => 'web']);

        $user = User::firstOrCreate([
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'cpf' => '417.348.460-70',
            'password' => Hash::make('smti@zoonoses')
        ]);

        $user2 = User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin2@mail.com',
            'cpf' => '396.761.660-65',
            'password' => Hash::make('smti@zoonoses')
        ]);

        $user->assignRole('super-admin');
        $user2->assignRole('administrador');
    }
}
