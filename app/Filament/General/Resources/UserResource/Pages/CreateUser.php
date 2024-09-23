<?php

namespace App\Filament\General\Resources\UserResource\Pages;

use App\Filament\General\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
