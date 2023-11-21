<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedicationResource\Pages;
use App\Filament\Resources\MedicationResource\RelationManagers;
use App\Models\Medication;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;

class MedicationResource extends Resource
{
    protected static ?string $model = Medication::class;

    protected static ?string $navigationGroup = "Allergy Information";

    public static function getPluralModelLabel(): string
    {
        return __("Medication Name");
    }

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->placeholder('e.g., Panadol')
                    ->label('Medication Name'),

                // TextInput::make('dosage')
                // ->placeholder('ex: 1'),

                // TextInput::make ('frequency')
                // ->placeholder('ex: Once'),

                // TimePicker::make('time')
                // ->placeholder('ex: 21:21:21'),

                //$table->boolean('is_enabled')->default(false);
                // Select::make('patient.user')
                // ->label('Parent / Guardian')
                // ->rules(['exists:users,id'])
                // ->required()
                // ->relationship('user', 'name')
                // ->searchable()
                // ->placeholder('Parent / Guardian'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Medication Name')
                    ->searchable(),
                // TextColumn::make('dosage'),
                // TextColumn::make('frequency'),
                // TextColumn::make('time'),
                // $table->boolean('is_enabled')->default(false);
                // TextColumn::make('patient.user.name')
                //     ->label('Parent / Guardian'),
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
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
            'index' => Pages\ListMedications::route('/'),
            'create' => Pages\CreateMedication::route('/create'),
            'edit' => Pages\EditMedication::route('/{record}/edit'),
        ];
    }
}
