<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrackingResource\Pages;
use App\Filament\Resources\TrackingResource\RelationManagers;
use App\Models\Patient;
use App\Models\Symptom;
use App\Models\Tracking;
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

class TrackingResource extends Resource
{
    protected static ?string $model = Tracking::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('patient_id')
                    ->label('Patient')
                    ->options(Patient::with('user')->get()->pluck('user.name', 'id'))
                    ->searchable()
                    ->placeholder('ex: Ali bin Ahmad')
                    ->columnSpan([
                        'default' => 2,
                        'md' => 1,
                        'lg' => 1,
                    ])
                    ->required(),

                // Select::make('symptom_id')
                //     ->label('Symptom')
                //     ->options(Symptom::with('symptom')->get()->pluck('symptom.name', 'id'))
                //     ->searchable()
                //     ->placeholder('ex: Skin-related Symptoms')
                //     ->columnSpan([
                //         'default' => 2,
                //         'md' => 1,
                //         'lg' => 1,
                //     ])
                //     ->required(),

                TextInput::make('severity')
                    ->placeholder('ex: 2'),

                TextInput::make('notes')
                    ->placeholder('ex: Rashes under eye'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('patient.user.name'),
                // TextColumn::make('patient.symptom.name'),
                TextColumn::make('severity'),
                TextColumn::make('notes'),
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
