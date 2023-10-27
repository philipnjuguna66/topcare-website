<?php

namespace App\Filament\Resources\Concerns;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

trait HeroImageSectionConcern
{
    protected function heroLeftImage(): Block
    {
        return Block::make('hero_left_image_section')->label('Hero section With Image')->schema([

            TextInput::make('heading')->nullable(),
            Checkbox::make('margin_top')->label('Add margin Top'),
            Select::make('align_image')->options([
                'left' => 'Left',
                'right' => 'Right',
            ])
                ->preload()
                ->searchable()
                ->required(),
            RichEditor::make('description')->required(),
            FileUpload::make('image')->reactive()->preserveFilenames()->required(fn($get): bool => blank($get("video_path"))),
            TextInput::make('video_path')->reactive()->required(fn($get): bool => blank($get("image"))),
            Checkbox::make('bg_white')->label('White Background')->required(),
            Grid::make(2)->schema([
                TextInput::make('cta_url')->label('cta url'),
                TextInput::make('cta_name')->label('cta label'),
            ]),

        ]);
    }

    public function heroWithService(): Block
    {
        return Block::make('hero_with_service_section')->reactive()->label(function (\Closure $get): string {
            return $get('heading') ?? "Hero with Sections";
        })
            ->schema([
                TextInput::make('columns')->numeric()->default(2)->maxValue(4)->reactive(),
                Checkbox::make('bg_white'),

                Grid::make(1)->schema(function ($get) : array{

                    $sections = [];

                    for ($i= 1; $i <= $get('columns'); $i++){
                       $sections[] =
                                Builder::make('columns_sections.'.$i)->label('Page Sections')
                                    ->blocks([
                                        Block::make('header')
                                            ->schema([
                                                TextInput::make('heading')->label("Heading")->reactive(),
                                                Textarea::make('subheading')->label("Sub Heading")->reactive(),
                                            ])
                                        ->columns(2),
                                        Block::make('image')
                                            ->schema([
                                                FileUpload::make('image')->preserveFilenames(),
                                            ]),
                                        Block::make('video')
                                            ->schema([
                                                TextInput::make('video_path'),
                                            ]),
                                        Block::make('booking_form')
                                            ->schema([
                                                Checkbox::make('has_contact_form'),
                                            ]),
                                        Block::make('text_area')
                                            ->schema([
                                                RichEditor::make('body'),
                                            ]),
                                    ])
                                    ->disableItemDeletion(false)
                                    ->collapsible();
                    }

                    return  $sections;
                }),


            ]);
    }

    public function htmlSection(): Block
    {
        return Block::make('html_section')
            ->schema([
                Textarea::make('html')
                    ->helperText('paste html code here, use tailwind css')
            ]);
    }
}
