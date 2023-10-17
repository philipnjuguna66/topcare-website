<div class="py-4 md:py-4 bg-primary-600">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-7xl sm:text-center">

            <div  {{ $animationEffect }}  class="grid grid-cols-1 md:grid-cols-2 gap-12 space-y-4 mt-4 py-4">
                <img class="bg-gray-50 object-cover w-full py-24"
                     src="{{ url(Storage::url($section->extra['bg_image'])) }}"
                     loading="lazy"
                     alt="{{ $section->extra['heading'] }}">

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
