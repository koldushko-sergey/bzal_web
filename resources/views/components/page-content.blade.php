@props(['page'])

<section class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        @if($page->image_url)
            <img src="{{ $page->image_url }}" alt="{{ $page->title }}" class="w-full rounded-lg mb-8 shadow-md">
        @endif
        <div class="prose prose-lg max-w-none prose-headings:text-[#0b1325] prose-a:text-[#e31e24]">
            {!! $page->content !!}
        </div>
    </div>
</section>
