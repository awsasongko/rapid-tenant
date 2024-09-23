<?php

namespace App\Jobs;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateTenantUser implements ShouldQueue
{
    use Queueable;

    public function __construct(protected Tenant $tenant){}

    public function handle(): void
    {
        $this->tenant->run(function () {
            User::create([
                'name'      => $this->tenant->name,
                'email'     => $this->tenant->email,
                'password'  => $this->tenant->password,
            ])
            ->assignRole('super_admin');
        });
    }
}
