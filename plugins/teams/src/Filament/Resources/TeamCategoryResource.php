<?php

namespace Appsorigin\Teams\Filament\Resources;


use App\Utils\Enums\TeamTemplatesEnum;


use Appsorigin\Teams\Filament\Resources\TeamCategoryResource\Pages\CreateCategoryTeam;
use Appsorigin\Teams\Filament\Resources\TeamCategoryResource\Pages\EditCategoryTeam;
use Appsorigin\Teams\Filament\Resources\TeamCategoryResource\Pages\ListCategoryTeam;
use Appsorigin\Teams\Filament\Resources\TeamResource\RelationManagers\RolesRelationManager;
use Appsorigin\Teams\Models\CompanyTeam;
use Appsorigin\Teams\Models\TeamCategory;
use Carbon\Carbon;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ReplicateAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class TeamCategoryResource extends Resource
{
    protected static ?string $model = TeamCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-add';

    protected static ?string $navigationLabel = "Teams Category";
    protected static ?string $navigationGroup = "Teams";

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->unique('team_categories', 'name'),
                Select::make('template')
                    ->options(function () : array {

                        $options = [];

                        foreach (TeamTemplatesEnum::cases() as $case) {

                            $options[$case->value] = $case->value;
                        }
                        return  $options;

                    })
                    ->searchable()
                    ->preload()
               ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make()
                    ->mountUsing(fn(CompanyTeam $record, ComponentContainer $form) => $form->fill([

                        'created_at' => $record->created_At,
                        'name' => $record->name,
                        'template' => $record->extra['template'],

                    ]))->form([
                    DatePicker::make('created_at'),
                    TextInput::make('name')
                        ->required()
                        ->unique('team_categories', 'name'),
                    Select::make('template')
                        ->options(function () : array {

                            $options = [];

                            foreach (TeamTemplatesEnum::cases() as $case) {

                                $options[$case->value] = $case->value;
                            }
                            return  $options;

                        })
                        ->searchable()
                        ->preload()
                ])
                    ->action(function (array $data , TeamCategory $record) {

                        $record->setCreatedAt(Carbon::parse($data['created_at']));

                        $record->saveQuietly();

                        $record->updateQuietly([
                            'name' => $data['name'],
                            'extra' => [
                                'template' => $data['template']
                            ]
                        ]);


                    }),
                ReplicateAction::make()->excludeAttributes(['id'])
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RolesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCategoryTeam::route('/'),
            'create' => CreateCategoryTeam::route('/create'),
            'edit' => EditCategoryTeam::route('/{record}/edit'),
        ];
    }

}
