<?php

namespace Database\Seeders\Central;

use Illuminate\Database\Seeder;
use App\Models\User;

class CentralDatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(\Database\Seeders\Central\RoleandPermissionSeeder::class);

        User::factory()
            ->create([
                'name' => 'root',
                'email' => 'root@mail.test',
                'password' => '12345678',
            ])
            ->assignRole('super_admin');
    }
}
