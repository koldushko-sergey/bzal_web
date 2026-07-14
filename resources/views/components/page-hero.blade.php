@props(['title', 'breadcrumbs' => []])

<section class="bg-[#0b1325] text-white py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        @if(count($breadcrumbs))
            <nav class="text-xs text-gray-400 mb-3 uppercase tracking-wider">
                @foreach($breadcrumbs as $i => $crumb)
                    @if($i > 0)<span class="mx-2">/</span>@endif
                    @if(isset($crumb['url']))
                        <a href="{{ $crumb['url'] }}" class="hover:text-white transition">{{ $crumb['label'] }}</a>
                    @else
                        <span class="text-gray-300">{{ $crumb['label'] }}</span>
                    @endif
                @endforeach
            </nav>
        @endif
        <h1 class="text-2xl sm:text-3xl font-black uppercase tracking-wide">{{ $title }}</h1>
    </div>
</section>
