
<div class="bg-gray-900 py-8 sm:py-12 @if($section->extra['bg_white']  ) bg-white @endif ">
    <div class="mx-auto max-w-7xl px-6 lg:px-8" {{ $animationEffect }}   >
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <h2 class="text-lg font-semibold leading-8 text-white"> {{ str($section->extra['heading'])->toHtmlString() }}</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">  {{ str($section->extra['subheading'])->toHtmlString() }}</p>
            <div class="mx-auto mt-10 grid grid-cols-4 items-start gap-x-8 gap-y-10 sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:grid-cols-5">
                <img class="col-span-2 max-h-12 w-full object-contain object-left lg:col-span-1" src="https://tailwindui.com/img/logos/transistor-logo-white.svg" alt="Transistor" width="158" height="48">
                <img class="col-span-2 max-h-12 w-full object-contain object-left lg:col-span-1" src="https://tailwindui.com/img/logos/reform-logo-white.svg" alt="Reform" width="158" height="48">
                <img class="col-span-2 max-h-12 w-full object-contain object-left lg:col-span-1" src="https://tailwindui.com/img/logos/tuple-logo-white.svg" alt="Tuple" width="158" height="48">
                <img class="col-span-2 max-h-12 w-full object-contain object-left lg:col-span-1" src="https://tailwindui.com/img/logos/savvycal-logo-white.svg" alt="SavvyCal" width="158" height="48">
                <img class="col-span-2 max-h-12 w-full object-contain object-left lg:col-span-1" src="https://tailwindui.com/img/logos/statamic-logo-white.svg" alt="Statamic" width="158" height="48">
            </div>
        </div>
    </div>
</div>
