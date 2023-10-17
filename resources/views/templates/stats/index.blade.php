<div class="bg-primary-600 h-96 py-24 sm:py-32 filter blur relative" style="background-position: center center;
 background-size: cover;
background-repeat: no-repeat;
background-image: url({{ \Illuminate\Support\Facades\Storage::url($section->extra['bg_image'] ) }});"
>


    <div class="mx-auto max-w-7xl px-6 lg:px-8 z-50 absolute left-[50%] fixed" style="transform: translate(-50%, -50%); top: 50%;">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="text-center text-white">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">{{ $section->extra['heading'] }}</h2>
                <p class="mt-4 text-lg leading-8 ">{{ $section->extra['subheading'] }}</p>
            </div>
            <dl class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4 z-50 opacity-100">
                @foreach($section->extra['counts'] as $stat)
                    <div class="flex flex-col p-8 text-center bg-green-400 text-gray-100 opacity-100">
                        <x-dynamic-component :component=" $stat['icon'] " class="mt-4 mx-auto h-12 w-12 text-center" />
                        <dt class=" font-semibold leading-6 text-center">{{  $stat['title'] }}</dt>
                        <div class="flex  flex-row mx-auto">
                            <dd class="order-first text-3xl font-semibold tracking-tight mx-auto"
                                x-data="animatedCounter( {{ $stat['count'] }}, 200, 0)"
                                x-text="Math.round(current.toFixed(2))"
                                x-intersect:enter="updatecounter"
                                x-intersect:leave="current=0"
                                x-transition>
                            </dd>


                            @if($stat['has_plus_icon'])
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto mt-2 font-bold">
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
