<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmergencyContactResource\Pages;
use App\Filament\Resources\EmergencyContactResource\RelationManagers;
use App\Models\EmergencyContact;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class EmergencyContactResource extends Resource
{
    protected static ?string $model = EmergencyContact::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // table->boolean('is_first_responder')->default(false);
                TextInput::make('name')
                    ->placeholder('ex: Mark Lee'),

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

                Select::make('patient_id')
                    ->label('Patient')
                    ->options(Patient::with('user')->get()->pluck('user.name', 'id'))
                    ->searchable()
                    ->placeholder('ex: Syed Lydieanna')
                    ->columnSpan([
                        'default' => 2,
                        'md' => 1,
                        'lg' => 1,
                    ])
                    ->required(),

                // $table->unsignedBigInteger('patient_id');
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                // $table->boolean('is_first_responder')->default(false);
                TextColumn::make('name'),
                TextColumn::make('phone_number'),
                TextColumn::make('patient.user.name')
                    ->label('Patient'),
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
            'index' => Pages\ListEmergencyContacts::route('/'),
            'create' => Pages\CreateEmergencyContact::route('/create'),
            'edit' => Pages\EditEmergencyContact::route('/{record}/edit'),
        ];
    }
}
