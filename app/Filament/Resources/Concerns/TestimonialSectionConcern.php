<?php

namespace App\Filament\Resources\Concerns;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

trait TestimonialSectionConcern
{
    protected function testimonialsSection(): Block
    {
        return Block::make('testimonials_section')->schema([
            TextInput::make('heading')->required(),
            TextInput::make('subheading')->nullable(),
            Checkbox::make('bg_white')->label('White Background')->nullable(),
            TextInput::make('count')->nullable()->numeric(),
            TextInput::make('link')->nullable(),

        ]);
    }

    protected function partnersSection(): Block
    {
        return Block::make('partners_section')->schema([
            TextInput::make('heading')->required(),
            TextInput::make('subheading')->nullable(),
            Checkbox::make('bg_white')->label('White Background')->nullable(),
            Repeater::make('partners')
            ->schema([
                Grid::make()
                ->schema([
                    FileUpload::make('logo')->preserveFilenames(),
                    TextInput::make('name')->nullable(),
                    TextInput::make('link')->url()->nullable(),
                ])
            ])
        ]);
    }
}
