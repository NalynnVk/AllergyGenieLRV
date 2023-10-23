<?php

namespace App\Filament\Resources;

use App\Enums\RelationshipEnum;
use App\Filament\Resources\DependantResource\Pages;
use App\Filament\Resources\DependantResource\RelationManagers;
use App\Helpers\EnumMap;
use App\Models\Dependant;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\BadgeColumn;
use Spatie\Enum\Laravel\Rules\EnumRule;

class DependantResource extends Resource
{
    protected static ?string $model = Dependant::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('user.name')
                    ->placeholder('e.g., Wan Aida'),

                DatePicker::make('user.date_of_birth')
                    ->placeholder('e.g., 20/20/2020'),

                TextInput::make('user.phone_number')
                    ->label('Phone Number')
                    ->rules(['max:255', 'string'])
                    ->required()
                    ->placeholder('e.g., +6012-345-6789')
                    ->columnSpan([
                        'default' => 2,
                        'md' => 1,
                        'lg' => 1,
                    ]),

                FileUpload::make('user.profile_photo_path')
                    ->visibility('private')
                    ->label(__('Profile Photo'))
                    ->required()
                    ->image()
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080')
                    // 10 mb
                    ->maxSize(10000)
                    // ->disk('profile')
                    ->columnSpan([
                        'default' => 2,
                        'md' => 1,
                        'lg' => 1,
                    ]),

                Select::make('patient_id')
                    ->label('Patient')
                    ->options(Patient::with('user')->get()->pluck('user.name', 'id'))
                    ->searchable()
                    ->placeholder('e.g., Ali bin Ahmad')
                    ->columnSpan([
                        'default' => 2,
                        'md' => 1,
                        'lg' => 1,
                    ])
                    ->required(),


                Select::make('relationship')
                    ->options(EnumMap::getRelationship())
                    ->rules([
                        new EnumRule(RelationshipEnum::class)
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
                TextColumn::make('user.name')
                    ->label('Dependant'),
                TextColumn::make('user.date_of_birth')
                    ->label('Date Of Birth'),
                TextColumn::make('user.phone_number')
                    ->label('Phone Number'),
                TextColumn::make('patient.user.name')
                    ->label('Parent / Guardian'),
                BadgeColumn::make('relationship_label')
                    ->colors([
                        'primary' => RelationshipEnum::Spouse()->label,
                        'primary' => RelationshipEnum::Father()->label,
                        'primary' => RelationshipEnum::Mother()->label,
                        'primary' => RelationshipEnum::Brother()->label,
                        'primary' => RelationshipEnum::Sister()->label,
                        'primary' => RelationshipEnum::Son()->label,
                        'primary' => RelationshipEnum::Daughter()->label,
                    ])
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
            'index' => Pages\ListDependants::route('/'),
            'create' => Pages\CreateDependant::route('/create'),
            'edit' => Pages\EditDependant::route('/{record}/edit'),
        ];
    }
}
