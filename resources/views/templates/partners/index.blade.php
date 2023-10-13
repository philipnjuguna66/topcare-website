<div class="@if($section->extra['bg_white']  ) bg-white @endif relative">
    <div class="py-24 sm:py-32">
        <div {{ $animationEffect }}   class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-x-8 gap-y-16 lg:grid-cols-2">
                <div class="mx-auto w-full max-w-xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900">  {{ str($section->extra['heading'])->toHtmlString() }} </h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600">  {{ str($section->extra['subheading'])->toHtmlString() }}</p>
                </div>
                <div class="mx-auto grid w-full max-w-xl grid-cols-2 items-center gap-y-12 sm:gap-y-14 lg:mx-0 lg:max-w-none lg:pl-8">
                    <img class="max-h-12 w-full object-contain object-left" src="https://tailwindui.com/img/logos/tuple-logo-gray-900.svg" alt="Tuple" width="105" height="48">
                    <img class="max-h-12 w-full object-contain object-left" src="https://tailwindui.com/img/logos/reform-logo-gray-900.svg" alt="Reform" width="104" height="48">
                    <img class="max-h-12 w-full object-contain object-left" src="https://tailwindui.com/img/logos/savvycal-logo-gray-900.svg" alt="SavvyCal" width="140" height="48">
                    <img class="max-h-12 w-full object-contain object-left" src="https://tailwindui.com/img/logos/laravel-logo-gray-900.svg" alt="Laravel" width="136" height="48">
                    <img class="max-h-12 w-full object-contain object-left" src="https://tailwindui.com/img/logos/transistor-logo-gray-900.svg" alt="Transistor" width="158" height="48">
                    <img class="max-h-12 w-full object-contain object-left" src="https://tailwindui.com/img/logos/statamic-logo-gray-900.svg" alt="Statamic" width="147" height="48">
                </div>
            </div>
        </div>
    </div>

</div>

