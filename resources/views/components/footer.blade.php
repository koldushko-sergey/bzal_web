<footer class="bg-[#0b1325] text-white mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <p class="text-xl font-black uppercase tracking-wider mb-4">БЗАЛ</p>
                @if($siteFooterText)
                    <p class="text-sm text-gray-400 leading-relaxed">{{ $siteFooterText }}</p>
                @endif
            </div>
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500 font-semibold mb-3">О предприятии</p>
                <ul class="space-y-2 text-sm text-gray-300">
                    <li><a href="{{ route('about.company') }}" class="hover:text-white transition">ОАО «БЗАЛ»</a></li>
                    <li><a href="{{ route('about.history') }}" class="hover:text-white transition">История</a></li>
                    <li><a href="{{ route('about.team') }}" class="hover:text-white transition">Наша команда</a></li>
                </ul>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500 font-semibold mb-3">Продукция</p>
                <ul class="space-y-2 text-sm text-gray-300">
                    <li><a href="{{ route('products.index') }}" class="hover:text-white transition">Каталог</a></li>
                    @foreach($navCategories->take(4) as $category)
                        <li><a href="{{ route('products.category', $category->slug) }}" class="hover:text-white transition">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500 font-semibold mb-3">Контакты</p>
                <ul class="space-y-2 text-sm text-gray-300">
                    @if($sitePhone)
                        <li><a href="tel:{{ preg_replace('/\s+/', '', $sitePhone) }}" class="hover:text-white transition">{{ $sitePhone }}</a></li>
                    @endif
                    @if($siteEmail)
                        <li><a href="mailto:{{ $siteEmail }}" class="hover:text-white transition">{{ $siteEmail }}</a></li>
                    @endif
                    @if($siteAddress)
                        <li class="text-gray-400">{{ $siteAddress }}</li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-10 pt-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-gray-500">
            <p>© {{ date('Y') }} ОАО «Барановичский завод автоматических линий»</p>
            <a href="{{ route('admin.login') }}" class="hover:text-gray-300 transition">Админ-панель</a>
        </div>
    </div>
</footer>
