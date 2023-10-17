<div class="my-4" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine">
    <div class="rounded-md shadow-lg  shadow-charcoal-500 bg-white flex flex-col md:flex-row">
        <div class="md:w-80 ">
            <img class="bg-primary-500" loading="lazy" alt="{{ $team->namr }}"
                 src="{{ \Illuminate\Support\Facades\Storage::url($team->featured_image) }}">
        </div>
        <div class="md:w-4/5">
            <div class="px-4 py-2 flex flex-col justify-between rounded-b-md bg-white">
                <div>
                    <p class="font-bold text-xl md:text-3xl">{{ $team->name }}</p>
                    <p class="font-bold text-sm">{{ $team->title }}</p>
                </div>
                <div>
                    {{ str($team->body)->limit('250',' ...')->toHtmlString() }}
                </div>
            </div>
            <div class="px-4 py-2">

                <a
                    wire:navigate
                    class="button"
                    href="{{ route('permalink.show', $item->link?->slug) }}">
                    Full Bio
                </a>
            </div>
        </div>
    </div>
</div>
