<div class="bg-primary-900 py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $section->extra['heading'] }}</h2>
                <p class="mt-4 text-lg leading-8 text-gray-600">{{ $section->extra['heading'] }}</p>
            </div>
            <dl class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">
                @foreach($section->extra['counts'] as $stat)
                <div class="flex flex-col bg-gray-400/5 p-8">
                   <div class="justify-center text-center">
                       <x-dynamic-component :component=" $stat['icon'] " class="mt-4 h-12 w-12 text-center" />
                   </div>
                    <dt class="text-sm font-semibold leading-6 text-gray-600">{{  $stat['title'] }}</dt>
                    <div class="flex  flex-row text-center">
                        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-50 text-center">
                            {{ $stat['count'] }}
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

