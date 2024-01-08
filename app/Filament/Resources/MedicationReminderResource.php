<?php

namespace App\Filament\Resources;

use App\Enums\DosageEnum;
use App\Enums\ReminderRepetitionEnum;
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
use Filament\Tables\Filters\Filter;

class MedicationReminderResource extends Resource
{
    // protected static bool $shouldRegisterNavigation = false;

    protected static ?string $model = MedicationReminder::class;

    protected static ?string $navigationGroup = "User Information";

    public static function getPluralModelLabel(): string
    {
        return __("Medication Reminder");
    }

    protected static ?string $navigationIcon = 'heroicon-o-clock';

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
                TextColumn::make('id')
                    ->searchable(),
                TextColumn::make('patient.user.name')
                    ->label('User Name')
                    ->searchable(),
                // TextColumn::make('user.name')
                //     ->label('User'),
                TextColumn::make('medication.name')
                    ->label('Medication Name')
                    ->searchable(),
                BadgeColumn::make('dosage_label')
                    ->colors([
                        'primary' => DosageEnum::Half()->label,
                        'primary' => DosageEnum::One()->label,
                        'primary' => DosageEnum::Two()->label,
                        'primary' => DosageEnum::More()->label,
                    ])
                    ->label('Dosage'),
                TextColumn::make('time_reminder')
                    ->searchable(),
                BadgeColumn::make('repititon_label')
                    ->colors([
                        'primary' => ReminderRepetitionEnum::Once()->label,
                        'primary' => ReminderRepetitionEnum::Twice()->label,
                        'primary' => ReminderRepetitionEnum::Three()->label,
                        'primary' => ReminderRepetitionEnum::Four()->label,
                        'primary' => ReminderRepetitionEnum::Everyday()->label,
                        'primary' => ReminderRepetitionEnum::Every()->label,
                        'primary' => ReminderRepetitionEnum::As()->label,
                        'primary' => ReminderRepetitionEnum::Before()->label,
                        'primary' => ReminderRepetitionEnum::After()->label,
                        'primary' => ReminderRepetitionEnum::Right()->label,
                        'primary' => ReminderRepetitionEnum::At()->label,
                    ])
                    ->label('Repitition'),
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
            'index' => Pages\ListMedicationReminders::route('/'),
            'create' => Pages\CreateMedicationReminder::route('/create'),
            'edit' => Pages\EditMedicationReminder::route('/{record}/edit'),
        ];
    }
}
