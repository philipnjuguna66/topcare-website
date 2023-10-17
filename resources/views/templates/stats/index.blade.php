<div class="py-4 md:py-4 bg-primary-600">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-7xl sm:text-center">

            <div  {{ $animationEffect }}  class="grid grid-cols-1 md:grid-cols-2 gap-12 space-y-4 mt-4 py-4">

                <div class="grid grid-cols-1 md:grid-cols-5 columns-12 gap-4 mt-12">
                    <div class="col-span-3">

                        <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative h-56 overflow-hidden rounded-lg md:h-[500px]">


                                @foreach($section->extra['images'] as $slider)
                                    <!-- Item {{ $loop->index + 1 }} -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{  \Illuminate\Support\Facades\Storage::url($image['image'])}}"
                                             class="w-[800px] h-auto absolute block max-w-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                                    </div>

                                @endforeach



                            </div>
                            <div class="flex justify-center items-center pt-4">
                                <button type="button" class="flex justify-center items-center mr-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                                 <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                     <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                                     <span class="sr-only">Previous</span>
                                 </span>
                                </button>
                                <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                                 <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                     <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                     <span class="sr-only">Next</span>
                                 </span>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="col-span-2 prose-2xl mt-12" style="background-size: cover;
                    background-position: center center; background-attachment: fixed;
                    background-image: url("{{ \Illuminate\Support\Facades\Storage::url($section->extra['bg_image']) }}")">
                        {!! $section->extra['content'] !!}

                        <div class="my-4 flex flex-col md:flex-row justify-between">

                            @if(isset($section->extra['cta_url'] ) && $section->extra['cta_url'] && $section->extra['cta_name']  )
                                <a href="{{ $section->extra['cta_url'] }}"
                                   class="line-clamp-3  leading-6 text-gray-50 button font-semibold rounded-tr-2xl rounded-bl-2xl px-4 py-0.5"
                                >
                                    {{ $section->extra['cta_name'] }}
                                </a>
                            @endif
                        </div>

                    </div>
                </div>


                <div class="">
                    <div class="">
                        <div class="mx-auto max-w-2xl lg:mr-0 lg:max-w-lg">
                            <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-50 sm:text-4xl">{{ $section->extra['heading'] }}</h2>
                            <p class="mt-6 text-lg leading-8 text-gray-50">{{ $section->extra['heading'] }}.</p>

                            <dl class="mt-16 grid max-w-xl grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 xl:mt-16">
                                @foreach($section->extra['counts'] as $stat)
                                    <div class="flex flex-row  gap-y-3 border-l border-secondary-900 pl-6">
                                        <dt class="text-sm leading-6 text-gray-50 text-center">{{ $stat['title'] }}</dt>
                                        <div class="flex  flex-row text-center">
                                            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-50 text-center"
                                                x-data="animatedCounter( {{ $stat['count'] }}, 200, 0)"
                                                x-text="Math.round(current.toFixed(2))"
                                                x-intersect:enter="updatecounter"
                                                x-intersect:leave="current=0"
                                                x-transition>
                                            </dd>


                                            @if($stat['has_plus_icon'])
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-center text-secondary-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                            @endif
                                        </div>
                                    </div>

                                @endforeach

                            </dl>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @push('scripts')


        <script>
            function animatedCounter(targer, time = 25000, start = 1) {
                return {
                    current: 0,
                    target: targer,
                    time: time,
                    start: start,
                    updatecounter: function() {
                        start = this.start;
                        const increment = (this.target - start) / this.time;
                        const handle = setInterval(() => {
                            if (this.current < this.target)
                                this.current += increment
                            else {
                                clearInterval(handle);
                                this.current = this.target
                            }
                        }, 1);
                    }
                };
            }
        </script>
    @endpush

</div>
