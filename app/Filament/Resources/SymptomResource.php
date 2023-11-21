<?php

namespace App\Filament\Resources;

use App\Enums\SymptomSeverityEnum;
use App\Filament\Resources\SymptomResource\Pages;
use App\Filament\Resources\SymptomResource\RelationManagers;
use App\Helpers\EnumMap;
use App\Models\Symptom;
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
use Filament\Tables\Columns\BadgeColumn;
use Spatie\Enum\Laravel\Rules\EnumRule;
use Filament\Tables\Filters\Filter;

class SymptomResource extends Resource
{
    protected static ?string $model = Symptom::class;

    protected static ?string $navigationGroup = "Allergy Information";

    public static function getPluralModelLabel(): string
    {
        return __("Symptom Category");
    }


    protected static ?string $navigationIcon = 'heroicon-o-heart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->placeholder('e.g., Neurological symptoms')
                    ->label('Symptom Name'),

                Select::make('severity')
                    ->options(EnumMap::getSymptomSeverity())
                    ->rules([
                        new EnumRule(SymptomSeverityEnum::class)
                    ])
                    ->disablePlaceholderSelection()
                    ->reactive(),

                TextInput::make('description')
                    ->placeholder('e.g., '),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Symptom Name')
                    ->searchable(),
                BadgeColumn::make('severity_label')
                    ->colors([
                        'primary' => SymptomSeverityEnum::Mild()->label,
                        'primary' => SymptomSeverityEnum::Severe()->label,
                    ])
                    ->label('Severity'),
                // ->searchable(),
                TextColumn::make('description')->limit(25)
                    ->searchable(),

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
            'index' => Pages\ListSymptoms::route('/'),
            'create' => Pages\CreateSymptom::route('/create'),
            'edit' => Pages\EditSymptom::route('/{record}/edit'),
        ];
    }
}
