<?php

namespace Appsorigin\Teams\Filament\Resources\TeamCategoryResource\Pages;

use Appsorigin\Blog\Filament\Resources\BlogResource;
use Appsorigin\Teams\Filament\Resources\TeamResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryTeam extends ListRecords
{
    protected static string $resource = TeamResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
