<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Check if tenancy is initialized (i.e., if a tenant is in context)
        if (InitializeTenancyByDomain::class) {
            // Tenant context: Run tenant-specific seeders
            $this->call(\Database\Seeders\Tenant\TenantDatabaseSeeder::class);
        } else {
            // Central app context: Run central-specific seeders
            $this->call(\Database\Seeders\Central\CentralDatabaseSeeder::class);
        }
    }
}
