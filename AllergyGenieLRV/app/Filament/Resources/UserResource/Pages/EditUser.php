<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Foundation\Auth\User;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    // protected function mutateFormDataBeforeFill(array $data): array
    // {
    //     $user = User::find($data['id']);
    //     $data['name'] = $user->name ?? null;
    //     $data['password'] = $user->password ?? null;
    //     $data['profile_photo_path'] = $user->profile_photo_path ?? null;

    //     return $data;
    // }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
