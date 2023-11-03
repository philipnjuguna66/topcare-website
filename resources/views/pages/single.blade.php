<x-guest-layout>
    @section('title', str($page->meta_title)->headline()->title())
    @section('description', $page->meta_description)
    @push('metas')
        @meta("title", $page->meta_title)
        @meta("description", $page->meta_description)
    @endpush

    <div class="">
        @foreach($page->sections as $section)

            @php
                $animationEffect = new \Illuminate\Support\HtmlString(' loading="lazy" data-aos="fade-right" set="200" data-aos-easing="ease-in-sine" data-aos-duration="600"');
                if ($loop->even){
                     $animationEffect = new \Illuminate\Support\HtmlString(' loading="lazy" data-aos="fade-left" set="200" data-aos-easing="ease-in-sine" data-aos-duration="600"');
                }


            @endphp

            @if($loop->first)
               <div class="">
                   @php
                       view($section->type->sectionPath() ,['section' => $section ,'animationEffect' => $animationEffect])->render();
                   @endphp
               </div>
            @endif

        @endforeach



</x-guest-layout>
