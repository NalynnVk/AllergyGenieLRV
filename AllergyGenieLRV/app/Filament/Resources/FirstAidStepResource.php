<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FirstAidStepResource\Pages;
use App\Filament\Resources\FirstAidStepResource\RelationManagers;
use App\Models\FirstAidStep;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class FirstAidStepResource extends Resource
{
    protected static ?string $model = FirstAidStep::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make ('step')
                ->placeholder('ex: If symptoms persist or worsen, consult a healthcare professional.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('step'),
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
            'index' => Pages\ListFirstAidSteps::route('/'),
            'create' => Pages\CreateFirstAidStep::route('/create'),
            'edit' => Pages\EditFirstAidStep::route('/{record}/edit'),
        ];
    }
}
