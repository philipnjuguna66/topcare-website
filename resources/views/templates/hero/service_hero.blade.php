<div class="md:py-12 py-8 bg-gray-50">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-7xl sm:text-center">

            <h1 class="text-2xl md:text-5xl font-bold tracking-tight"> {{ $section->extra['heading'] }}</h1>

        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 space-y-4 mt-4 py-4">

            <div>
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


        </div>
    </div>
</div>
