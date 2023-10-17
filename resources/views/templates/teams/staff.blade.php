<div class=" px-8 py-4 bg-white  rounded-md shadow-charcoal-500 shadow-lg">
    <div class="flex flex-col-reverse md:flex-row gap-4">
        <div class="md:w-40">
            <img class="w-20 h-20 rounded-full bg-primary-500"
                 loading="lazy" alt="{{ $team->name }}"
                 src="{{ Illuminate\Support\Facades\Storage::url($team->featured_image)  }}">
        </div>
        <div class="md:w-4/5 relative">
            <div class="mb-12">
                <p class="font-bold text-md">{{ $team->name }}</p>
                <p class="text-sm font-normal">{{ $team->title }}</p>
            </div>

            <a
                wire:navigate
                class="button"
                href="{{ route('permalink.show', $item->link?->slug) }}">
                Full Bio
            </a>
        </div>
    </div>
</div>
