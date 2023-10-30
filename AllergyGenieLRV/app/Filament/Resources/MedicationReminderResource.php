<?php

namespace App\Filament\Resources;

use App\Enums\DosageEnum;
use App\Filament\Resources\MedicationReminderResource\Pages;
use App\Filament\Resources\MedicationReminderResource\RelationManagers;
use App\Helpers\EnumMap;
use App\Models\Medication;
use App\Models\MedicationReminder;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Spatie\Enum\Laravel\Rules\EnumRule;

class MedicationReminderResource extends Resource
{
    protected static ?string $model = MedicationReminder::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('User')
                    ->options(User::pluck('name', 'id'))
                    ->searchable()
                    ->placeholder('ex: Wan Syahirah')
                    ->columnSpan([
                        'default' => 2,
                        'md' => 1,
                        'lg' => 1,
                    ])
                    ->required(),

                Select::make('medication_id')
                    ->label('Medication Name')
                    ->options(Medication::pluck('name', 'id'))
                    ->searchable()
                    ->placeholder('ex: Panadol')
                    ->columnSpan([
                        'default' => 2,
                        'md' => 1,
                        'lg' => 1,
                    ])
                    ->required(),

                Select::make('dosage')
                    ->options(EnumMap::getDosage())
                    ->rules([
                        new EnumRule(MedicationReminderEnum::class)
                    ])
                    ->disablePlaceholderSelection()
                    ->reactive(),

                Select::make('repititon')
                    ->options(EnumMap::getRepititon())
                    ->rules([
                        new EnumRule(MedicationReminderEnum::class)
                    ])
                    ->disablePlaceholderSelection()
                    ->reactive(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('user.name'),
                TextColumn::make('medication.name')
                    ->label('Medication Name'),
                // BadgeColumn::make('reminder_label')
                //     ->colors([
                //         'primary' => DosageEnum::Once()->label,
                //         'primary' => DosageEnum::Daily()->label,
                //         'primary' => DosageEnum::Weekly()->label,
                //     ]),
                TextColumn::make('time_reminder'),
                // BadgeColumn::make('dosage_label')
                //     ->colors([
                //         'primary' => DosageEnum::Half()->label,
                //         'primary' => DosageEnum::One()->label,
                //         'primary' => DosageEnum::Two()->label,
                //         'primary' => DosageEnum::More()->label,
                //     ])
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
            'index' => Pages\ListMedicationReminders::route('/'),
            'create' => Pages\CreateMedicationReminder::route('/create'),
            'edit' => Pages\EditMedicationReminder::route('/{record}/edit'),
        ];
    }
}
