<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $addressData = $data['address'];
    //     unset($data['address']);

    //     $user = User::create($data);
    //     $user->address()->create($addressData);

    //     return $data;
    // }
}
