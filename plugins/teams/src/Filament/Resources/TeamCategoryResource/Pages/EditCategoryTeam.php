<?php

namespace Appsorigin\Teams\Filament\Resources\TeamCategoryResource\Pages;

use App\Events\BlogCreatedEvent;
use Appsorigin\Teams\Filament\Resources\TeamCategoryResource;
use Appsorigin\Teams\Filament\Resources\TeamResource;
use Appsorigin\Teams\Models\CompanyTeam;
use Carbon\Carbon;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditCategoryTeam extends EditRecord
{
    protected static string $resource = TeamCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
