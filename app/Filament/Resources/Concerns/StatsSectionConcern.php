<?php

namespace App\Filament\Resources\Concerns;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Guava\FilamentIconPicker\Forms\IconPicker;

trait StatsSectionConcern
{
    protected function statsSection(): Block
    {
        return Block::make('stats_section')->schema([

            TextInput::make('heading')->required(),
            TextInput::make('subheading')->numeric(),
           // FileUpload::make('images')->multiple()->preserveFilenames(),
            FileUpload::make('bg_image')->label('Background Image')->nullable()->preserveFilenames(),
            Repeater::make('counts')
            ->schema([
                TextInput::make('title')->required(),
                TextInput::make('count')->required()->numeric(),
                IconPicker::make('icon')
                    ->sets(['heroicons', 'fontawesome-solid']),
                Checkbox::make('has_plus_icon')->helperText('+'),
            ])->collapsible()->defaultItems(4),

        ]);
    }
}
