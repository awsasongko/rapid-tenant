<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\User;

class TenantDatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(\Database\Seeders\Tenant\RoleandPermissionSeeder::class);
    }
}
