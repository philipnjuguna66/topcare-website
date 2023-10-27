<div class="bg-gray-50 @if($section->extra['bg_white'] )  bg-white @endif">
    <div class="md:mx-auto md:w-4/5 max-w-7xl px-2 lg:px-8" {{ $animationEffect }}>
        <div class="grid grid-cols-1 md:grid-cols-{{ $section->extra['columns'] }}  gap-3 space-y-4 mt-4 py-4">
            @foreach($section->extra['columns_sections'] as $index => $columns)

               <div class="text-justify">

                   @foreach($columns as $column)

                       <?php
                           $html = match ($column['type'])
                           {
                             "header" => view('templates.hero._header', ['heading' => $column['data']['heading'], "subheading" => $column['data']['subheading']])->render(),
                             "video" => view('templates.embeded._video_iframe', ["autoplay" => true, 'videoUri' => $column['data']['video_path']])->render(),
                             "image" => view('templates.hero._image', ['image' => $column['data']['image'],'section' => $section])->render(),
                             "booking_form" => view('templates.hero._site')->render(),
                             "text_area" => view('templates.hero._text_area', ['html' => $column['data']['body']])->render(),
                             "default" => null,
                           };
                           ?>
                       {{ str($html)->toHtmlString() }}
                   @endforeach
               </div>

            @endforeach

        </div>
    </div>
</div>
