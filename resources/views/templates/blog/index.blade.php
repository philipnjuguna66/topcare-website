<section  class="@if($section->extra['bg_white']  ) bg-white @endif">
    <div class="py-4 md:py-12 md:mx-auto max-w-7xl ">
        <div {{ $animationEffect }}   class="md:mx-auto px-6 lg:px-8">
            <div class="md:mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl"> {{ str($section->extra['heading'])->toHtmlString() }}</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600"> {{ str($section->extra['subheading'])->toHtmlString() }}</p>
            </div>

                <livewire:blog.blog-list :take="$section->extra['count']"/>

            @if(isset($section->extra['blog_link']) && ! is_null($section->extra['blog_link']))

                <div class=" ">
                    <div class="px-6 py-2 sm:px-6 sm:py-1 lg:px-8">
                        <div class="md:mx-auto max-w-2xl text-center">
                            <div class="mt-10 flex items-center justify-center gap-x-6">
                                <a
                                    wire:navigate
                                    href="{{ route('permalink.show', $section->extra['blog_link']) }}"
                                    class="button bg-secondary-500">
                                    View more Blogs <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>
</section>
