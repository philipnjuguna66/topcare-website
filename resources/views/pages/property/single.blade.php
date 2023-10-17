<x-guest-layout>
    @section('title', str($page->meta_title)->headline()->title())
    @section('description', $page->meta_description)
    @section('whatsApp', $whatsApp)
    @push('metas')

        @meta("title", $page->meta_title)
        @meta("description", $page->meta_description)
    @endpush
    <div class="bg-gray-50">


        <div class="mx-auto md:w-4/5 max-w-7xl py-8 md:mt-20 md:py-8 px-8">
            <h1 class="py-12 md:py-4 font-extrabold text-2xl lg:text-4xl text-center uppercase px-8 md:px-0">{{ $page->name }}</h1>

            <div class="grid grid-cols-1 md:grid-cols-6 gap-4 py-8 max-w-7xl">

                <div class="col-span-4">
                    @if(! is_null($page->video_path))
                        @include('templates.embeded._video_iframe' , [ 'videoUri' =>   $page->video_path, 'autoplay' => true ])
                    @else
                        <img class="h-auto w-full max-w-full rounded-lg object-cover object-center"
                             src="{{  \Illuminate\Support\Facades\Storage::url($page->featured_image)}}"
                             alt="{{ $page->meta_title }}"
                        >
                    @endif

                    <article class="mt-4 prose text-justify">
                        {{ str($page->body)->toHtmlString() }}
                    </article>


                    <div>


                        <div class="mt-2">
                            @if( ! is_null($page->map)  )
                                {{  new \Illuminate\Support\HtmlString($page->map) }}
                            @endif
                        </div>

                        <div class="mt-2">
                            @if( ! is_null($page->mutation)  )
                                <a
                                    target="_blank"
                                    class="button text-white px-8 py-1 rounded"
                                    href="{{ asset(\Illuminate\Support\Facades\Storage::url($page->mutation)) }}">

                                    Click here to view plots on offer
                                </a>

                            @endif
                        </div>
                    </div>
                    <div class=" py-12">

                        @if(is_array($page->gallery))

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                @foreach($page->gallery as $gallery)
                                    <div>

                                        <img class="h-auto w-full max-w-full rounded-lg object-cover object-center"
                                             src="{{  \Illuminate\Support\Facades\Storage::url($gallery)}}"
                                             alt="{{ $page->meta_title }}"
                                        >
                                    </div>
                                @endforeach

                            </div>
                        @endif


                    </div>

                </div>

                <div class="col-span-2">

                    <livewire:contact.book-site-visit :page="$page"/>


                    <div class="mt-4 py-8  bg-white px-8 py-4  shadow-2xl rounded-xl px-4 mt-5 bg-gray-100 py-8 border-b-4 border-primary-600 border-b-primary-600">
                        <h3 class="font-semibold text-xl md:text-3xl md:font-extrabold text-center px-2"> Amenities and
                            Features</h3>

                        @if(is_array($page->amenities))
                            <ul class="list-decimal mx-4">
                                @foreach($page->amenities as $amenity => $value)

                                    <li class="px-8 font-semibold">
                                        {{ str($value)->toHtmlString() }}
                                    </li>

                                @endforeach
                            </ul>
                        @else
                            <div class="px-8 py-4 prose">
                                {{ str($page->amenities)->toHtmlString() }}
                            </div>
                        @endif

                    </div>


                </div>

            </div>
        </div>
        <div class="mx-auto md:w-4/5 max-w-7xl px-8 pb-8">
            <h3 class="py-4 text-center font-bold text-md md:text-4xl">Similar Projects</h3>

            <livewire:project.website.similar-project :project="$page"/>
        </div>
    </div>

</x-guest-layout>
