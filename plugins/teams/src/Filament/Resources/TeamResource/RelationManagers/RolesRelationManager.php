<?php

namespace Appsorigin\Teams\Filament\Resources\TeamResource\RelationManagers;

use App\Utils\Enums\TeamTemplatesEnum;
use Appsorigin\Teams\Models\CompanyTeam;
use Appsorigin\Teams\Models\TeamCategory;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RolesRelationManager extends RelationManager
{
    protected static string $relationship = 'teamCategories';

    protected static ?string $recordTitleAttribute = 'name';

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
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->form([
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
                ->action(fn(array $data) => TeamCategory::create([
                    'name' => $data['name'],
                    'extra' => [
                        'template' => $data['template']
                    ]
                ])),
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->mutateFormDataUsing(fn(CompanyTeam $record, $form) => $form->fill([

                        'name' => $record->name,
                        'template' => $record->extra['template'],

                    ]))
                    ->form([
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
                    ->action(fn(array $data, TeamCategory $record) => $record->updateQuietly([
                        'name' => $data['name'],
                        'extra' => [
                            'template' => $data['template']
                        ]
                    ])),
                Tables\Actions\DetachAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make(),

            ]);
    }
}
