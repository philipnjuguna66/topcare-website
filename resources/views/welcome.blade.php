<x-guest-layout>
    @section('title', str($page->meta_title)->headline()->title())
    @section('description', $page->meta_description)
    @push('metas')
        @meta("title", $page->meta_title)
        @meta("description", $page->meta_description)
    @endpush

    <div class="mt-0">
        @foreach($page->sections as $section)

            @php
                $animationEffect = "";
                if ($loop->even){
                     $animationEffect = "";
                }
            @endphp

            @include($section->type->sectionPath() ,['section' => $section ,'animationEffect' => $animationEffect])
        @endforeach

    </div>

</x-guest-layout>
