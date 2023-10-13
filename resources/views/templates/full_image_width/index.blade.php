<section class="">
    <img
        loading="lazy"
        class="w-full object-cover py-8"
        src="{{  \Illuminate\Support\Facades\Storage::url($section->extra['image']) }}"
        alt="{{ settings('site_name') }}"
    >
</section>
