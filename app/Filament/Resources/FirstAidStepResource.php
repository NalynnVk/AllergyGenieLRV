<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FirstAidStepResource\Pages;
use App\Filament\Resources\FirstAidStepResource\RelationManagers;
use App\Models\FirstAidStep;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;

class FirstAidStepResource extends Resource
{
    protected static ?string $model = FirstAidStep::class;

    protected static ?string $navigationGroup = "Care Plan Information";

    public static function getPluralModelLabel(): string
    {
        return __("First Aid Step");
    }

    protected static ?string $navigationIcon = 'heroicon-o-folder-add';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('step')
                    ->placeholder('e.g., If symptoms persist or worsen, consult a healthcare professional.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable(),
                TextColumn::make('step')->limit(108)
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
            'index' => Pages\ListFirstAidSteps::route('/'),
            'create' => Pages\CreateFirstAidStep::route('/create'),
            'edit' => Pages\EditFirstAidStep::route('/{record}/edit'),
        ];
    }
}
