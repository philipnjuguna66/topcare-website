<section class="">
    <img
        loading="lazy"
        class="w-full object-cover py-12"
        src="{{  \Illuminate\Support\Facades\Storage::url($section->extra['image']) }}"
        alt="{{ settings('site_name') }}"
    >
</section>
