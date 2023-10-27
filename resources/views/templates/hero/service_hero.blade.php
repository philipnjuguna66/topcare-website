<div class="md:pt-24 bg-gray-50 @if($section->extra['bg_white'] )  bg-white @endif">
    <div class="mx-auto w-4/5 max-w-7xl px-2 lg:px-8" {{ $animationEffect }}>
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

           {{-- <div>
                <div class="py-2 dark:text-white">
                    {{ $section->extra['subheading'] }}
                </div>


                @foreach($section->extra['sections'] as $index => $content)
                    <div
                        class="prose shadow-md rounded-md px-4 mt-5 bg-gray-100 py-8 border-b-4 border-primary-600 border-b-primary-600">

                        {{ str($content['content'])->toHtmlString() }}

                    </div>
                @endforeach


            </div>

            <div class="filter bg-blend-multiply  mt-3 ">
                @if(isset($section->extra['has_contact_form']) && $section->extra['has_contact_form'])
                    <div class="">
                        <livewire:contact.book-site-visit/>
                    </div>
                @else

                    @if(isset($section->extra['video_path']) && filled($section->extra['video_path']) )
                        @include('templates.embeded._video_iframe' , [ 'videoUri' =>   $section->extra['video_path'], 'autoplay' => true ])
                    @else

                        <img
                            loading="lazy"
                            src="{{ \Illuminate\Support\Facades\Storage::url($section->extra['image']) }}"
                            class="object-cover py-20"
                        >

                    @endif
                @endif

            </div>
--}}

        </div>
    </div>
</div>
