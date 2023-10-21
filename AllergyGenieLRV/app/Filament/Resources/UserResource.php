<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make ('name')
                ->placeholder('ex: Davikah Sharma'),

                DatePicker::make('date_of_birth')
                ->placeholder('ex: 20/20/2020'),

                TextInput::make('phone_number')
                ->label('Phone Number')
                ->rules(['max:255', 'string'])
                ->required()
                ->placeholder('ex: +6012-345-6789')
                ->columnSpan([
                    'default' => 2,
                    'md' => 1,
                    'lg' => 1,
                ]),

                TextInput::make ('password')
                ->placeholder('ex: Davikah@2020'),

                FileUpload::make('profile_photo_path')
                    ->visibility('private')
                    ->label(__('Profile Photo'))
                    ->required()
                    ->image()
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080')
                    // 10 mb
                    ->maxSize(10000)
                    ->disk('profile')
                    ->columnSpan([
                        'default' => 2,
                        'md' => 1,
                        'lg' => 1,
                    ]),

                // TextInput::make ('email'), tak perlu?
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('date_of_birth'),
                TextColumn::make('phone_number'),
                // TextColumn::make('password'),
                // TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
