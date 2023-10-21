<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsightResource\Pages;
use App\Filament\Resources\InsightResource\RelationManagers;
use App\Models\Insight;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;


class InsightResource extends Resource
{
    protected static ?string $model = Insight::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('photo_path')
                    ->visibility('private')
                    ->label(__('Insight Photo'))
                    ->required()
                    ->image()
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080')
                    // 10 mb
                    ->maxSize(10000)
                    ->disk('insight')
                    ->columnSpan([
                        'default' => 2,
                        'md' => 1,
                        'lg' => 1,
                    ]),

                TextInput::make ('title')
                ->placeholder('ex: Allergic Management Treatment'),

                TextInput::make('description')
                ->placeholder('ex: Allergic management treatment involves a combination of approaches aimed at reducing exposure to allergens, managing symptoms, and modifying the immune systems response to allergens.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('title'),
                TextColumn::make('description'),
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
            'index' => Pages\ListInsights::route('/'),
            'create' => Pages\CreateInsight::route('/create'),
            'edit' => Pages\EditInsight::route('/{record}/edit'),
        ];
    }
}
