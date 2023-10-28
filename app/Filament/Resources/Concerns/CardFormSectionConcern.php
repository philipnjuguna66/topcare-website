<?php

namespace App\Filament\Resources\Concerns;

use App\Models\Permalink;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

trait CardFormSectionConcern
{
    protected function cardSection(): Block
    {
        return Block::make('card_section')->schema([

            TextInput::make('heading')->nullable(),
            TextInput::make('columns')->numeric()->default(3),
            TextInput::make('subheading')->nullable(),
            TextInput::make('view_more_link')->url()->nullable(),
            TextInput::make('view_more_link_label')->nullable(),
            Checkbox::make('bg_white')->label('White Background')->nullable(),

            Repeater::make('cards')
            ->schema([
                TextInput::make('title')->nullable(),
                FileUpload::make('image')->preserveFilenames()->nullable(),
                Textarea::make('description')->nullable(),
                Select::make('project_link')
                    ->options(function (): array {

                        $options = [];

                        foreach (Permalink::query()->whereType('page')->cursor() as $link) {

                            $options[$link->slug] = $link->linkable?->name;

                        }

                        return $options;
                    })
                    ->searchable()
                    ->preload(),
                Checkbox::make('has_modal')->label('View Description on a Modal')
                ->default(false),
            ])
                ->collapsible(),

        ]);
    }
}
