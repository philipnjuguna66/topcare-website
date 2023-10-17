<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $section->extra['heading'] }}</h2>
                <p class="mt-4 text-lg leading-8 text-gray-600">{{ $section->extra['heading'] }}</p>
            </div>
            <dl class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">
                @foreach($section->extra['counts'] as $stat)
                <div class="flex flex-col bg-gray-400/5 p-8">
                    <x-dynamic-component :component=" $stat['icon'] " class="mt-4 h-8 w-8" />
                    <dt class="text-sm font-semibold leading-6 text-gray-600">{{  $stat['title'] }}</dt>
                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-50 text-center"
                        x-data="animatedCounter( {{ $stat['count'] }}, 200, 0)"
                        x-text="Math.round(current.toFixed(2))"
                        x-intersect:enter="updatecounter"
                        x-intersect:leave="current=0"
                        x-transition>
                    </dd>
                </div>
                @endforeach
            </dl>
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
