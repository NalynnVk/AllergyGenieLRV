<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrackingResource\Pages;
use App\Filament\Resources\TrackingResource\RelationManagers;
use App\Models\Allergen;
use App\Models\Patient;
use App\Models\Symptom;
use App\Models\Tracking;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class TrackingResource extends Resource
{
    protected static ?string $model = Tracking::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('patient_id')
                    ->label('User')
                    ->options(Patient::with('user')->get()->pluck('user.name', 'id'))
                    ->searchable()
                    ->placeholder('ex: Ali bin Ahmad')
                    ->columnSpan([
                        'default' => 2,
                        'md' => 1,
                        'lg' => 1,
                    ])
                    ->required(),

                Select::make('symptom_id')
                    ->label('Symptom Category')
                    ->options(Symptom::pluck('name', 'id'))
                    ->searchable()
                    ->placeholder('ex: Skin-related Symptoms')
                    ->columnSpan([
                        'default' => 2,
                        'md' => 1,
                        'lg' => 1,
                    ])
                    ->required(),

                Select::make('allergen_id')
                    ->label('Food / Medication')
                    ->options(Allergen::pluck('name', 'id'))
                    ->searchable()
                    ->placeholder('ex: Dairy Products')
                    ->columnSpan([
                        'default' => 2,
                        'md' => 1,
                        'lg' => 1,
                    ])
                    ->required(),

                TextInput::make('severity')
                    ->placeholder('e.g., 2'),

                Textarea::make('notes')
                    ->placeholder('e.g., Rashes under eye')
                    ->label('Additional Notes'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('patient.user.name'),
                TextColumn::make('symptom.name')
                    ->label('Symptom Category'),
                TextColumn::make('allergen.name')
                    ->label('Food / Medication'),
                TextColumn::make('severity'),
                TextColumn::make('notes')->limit(25)
                    ->label('Additional Notes'),
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
            'index' => Pages\ListTrackings::route('/'),
            'create' => Pages\CreateTracking::route('/create'),
            'edit' => Pages\EditTracking::route('/{record}/edit'),
        ];
    }
}
