<?php

namespace Appsorigin\Teams\Filament\Resources\TeamCategoryResource\Pages;

use App\Events\BlogCreatedEvent;
use Appsorigin\Blog\Filament\Resources\BlogResource;
use Appsorigin\Plots\Models\Blog;
use Appsorigin\Teams\Filament\Resources\TeamCategoryResource;
use Appsorigin\Teams\Filament\Resources\TeamResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateCategoryTeam extends CreateRecord
{
    protected static string $resource = TeamCategoryResource::class;


}
