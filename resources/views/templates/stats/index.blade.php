<div class="bg-white">
    <div {{ $animationEffect }}    class="mx-auto w-4.5 max-w-7xl">
        <div class="relative ">
            <img class="h-56 w-full bg-gray-50 object-cover lg:absolute lg:inset-y-0 lg:left-0 lg:h-full lg:w-1/2"
                 src="{{ url(Storage::url($section->extra['bg_image'])) }}"
                 loading="lazy"
                 alt="{{ $section->extra['heading'] }}">
            <div class="mx-auto grid max-w-7xl lg:grid-cols-2">
                <div class="px-6 pb-24 pt-16 sm:pb-32 sm:pt-20 lg:col-start-2 lg:px-8 lg:pt-32">
                    <div class="mx-auto max-w-2xl lg:mr-0 lg:max-w-lg">
                        <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $section->extra['heading'] }}</h2>
                        <p class="mt-6 text-lg leading-8 text-gray-600">{{ $section->extra['heading'] }}.</p>

                        <dl class="mt-16 grid max-w-xl grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 xl:mt-16">
                            @foreach($section->extra['counts'] as $stat)
                                <div class="flex flex-col gap-y-3 border-l border-secondary-900/10 pl-6">
                                    <dt class="text-sm leading-6 text-gray-600">{{ $stat['title'] }}</dt>
                                    <div class="flex">
                                        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900"
                                            x-data="animatedCounter( {{ $stat['count'] }}, 200, 0)"
                                            x-text="Math.round(current.toFixed(2))"
                                            x-intersect:enter="updatecounter"
                                            x-intersect:leave="current=0"
                                            x-transition>

                                        </dd>

                                        @if($stat['has_plus_icon'])
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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



<div class="relative bg-gray-950 hidden">
    <section  class="bg-opacity-90 py-12 bg-gray-950 bg-cover bg-center bg-norepeat" style=" background-image: url('{{ url(Storage::url($section->extra['bg_image'])) }}');  background-position: center center; background-size: cover; background-repeat: no-repeat ">


        <div class="" >
            <div class=" mx-auto md:w-4/5 py-12 lg:py-24" >
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div  {{ $animationEffect }} class="mx-auto max-w-2xl lg:max-w-none">
                        <div class="text-center">
                            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl text-white">{{ $section->extra['heading'] }}</h2>
                            <p class="mt-4 text-lg leading-8  text-gray-50">{{ $section->extra['subheading'] }}</p>
                        </div>

                        <dl class="mt-16 grid grid-cols-1 gap-4 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">
                            @foreach($section->extra['counts'] as $stat)
                                <div class="flex flex-col bg-white p-8 shadow-2xl shadow-white/50 rounded-md ">
                                    <dt class="text-sm font-semibold leading-6 text-gray-900">{{ $stat['title'] }}</dt>
                                    <div class="flex justify-center items-center text-center">
                                        <dd
                                            class="order-first text-3xl font-semibold tracking-tight text-gray-900">
                                            <div
                                                x-data="animatedCounter( {{ $stat['count'] }}, 200, 0)"
                                                x-text="Math.round(current.toFixed(2))"
                                                x-intersect:enter="updatecounter"
                                                x-intersect:leave="current=0"
                                                x-transition
                                            >


                                            </div>

                                        </dd>
                                        @if($stat['has_plus_icon'])
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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
    </section>
</div>
