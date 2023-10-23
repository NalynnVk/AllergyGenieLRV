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


class SymptomResource extends Resource
{
    protected static ?string $model = Symptom::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->placeholder('e.g., Neurological symptoms'),

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
                TextColumn::make('id'),
                TextColumn::make('name'),
                BadgeColumn::make('severity_label')
                    ->colors([
                        'primary' => SymptomSeverityEnum::Mild()->label,
                        'primary' => SymptomSeverityEnum::Severe()->label,
                    ]),
                TextColumn::make('description')->limit(25)

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
            'index' => Pages\ListSymptoms::route('/'),
            'create' => Pages\CreateSymptom::route('/create'),
            'edit' => Pages\EditSymptom::route('/{record}/edit'),
        ];
    }
}
