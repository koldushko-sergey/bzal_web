<header class="relative z-50">
    <div class="bg-[#0b1325] text-white font-sans border-b border-gray-800">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 flex items-center justify-between">
            <div class="flex items-center space-x-4 md:space-x-8">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group shrink-0">
                    <div class="w-8 h-8 flex items-center justify-center border-2 border-white rounded-md p-1 group-hover:border-gray-300 transition">
                        <svg class="w-full h-full text-white group-hover:text-gray-300 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <span class="text-xl sm:text-2xl font-black tracking-wider uppercase">БЗАЛ</span>
                </a>

                <div class="hidden md:block border-l border-gray-600 pl-6 leading-tight">
                    <p class="text-[11px] text-gray-400 font-medium uppercase tracking-wider">{{ $siteSlogan1 }}</p>
                    <p class="text-[11px] text-white font-bold uppercase tracking-wider">{{ $siteSlogan2 }}</p>
                </div>
            </div>

            <div class="flex items-center space-x-3 sm:space-x-6">
                <div class="hidden sm:flex items-center space-x-3 text-sm">
                    <span class="text-gray-400 font-medium uppercase tracking-wider text-[11px]">Контакты</span>
                    <a href="tel:{{ preg_replace('/[^\d+]/', '', $sitePhone) }}" class="text-white font-extrabold text-base tracking-wide hover:text-red-500 transition">
                        {{ $sitePhone }}
                    </a>
                </div>

                <a href="{{ route('contacts.index') }}" class="hidden sm:inline-block bg-[#e31e24] hover:bg-[#c21419] text-white font-bold uppercase tracking-wider text-[11px] px-4 py-2.5 sm:px-6 sm:py-3 rounded transition duration-200 shrink-0">
                    Оставить заявку
                </a>

                <button id="a11y-toggle" type="button" aria-pressed="false" class="bg-[#1a2436] hover:bg-[#25324a] p-3 rounded text-gray-400 hover:text-white transition shrink-0" title="Версия для слабовидящих">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </button>

                <button id="mobile-menu-toggle" type="button" aria-expanded="false" aria-controls="main-nav" class="lg:hidden bg-[#1a2436] hover:bg-[#25324a] p-3 rounded text-gray-300 hover:text-white transition shrink-0">
                    <svg id="mobile-menu-icon-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg id="mobile-menu-icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <nav id="main-nav" class="bg-[#101b30] border-t border-gray-800/60 hidden lg:block">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <ul class="flex items-center flex-wrap gap-x-1 text-[12px] font-semibold uppercase tracking-wider text-gray-300">
                    <li>
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">Главная</a>
                    </li>

                    <li class="nav-dropdown group" data-nav-dropdown>
                        <button type="button" class="nav-dropdown-trigger {{ request()->routeIs('about.*') ? 'nav-link-active' : '' }}" aria-expanded="false">
                            <span>О предприятии</span>
                            <svg class="nav-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <ul class="nav-dropdown-menu">
                            <li><a href="{{ route('about.company') }}" class="nav-dropdown-link {{ request()->routeIs('about.company') ? 'nav-dropdown-link-active' : '' }}">ОАО «БЗАЛ»</a></li>
                            <li><a href="{{ route('about.history') }}" class="nav-dropdown-link {{ request()->routeIs('about.history') ? 'nav-dropdown-link-active' : '' }}">История</a></li>
                            <li><a href="{{ route('about.team') }}" class="nav-dropdown-link {{ request()->routeIs('about.team') ? 'nav-dropdown-link-active' : '' }}">Наша команда</a></li>
                            <li><a href="{{ route('about.corporate') }}" class="nav-dropdown-link {{ request()->routeIs('about.corporate') ? 'nav-dropdown-link-active' : '' }}">Корпоративная информация</a></li>
                        </ul>
                    </li>

                    <li class="nav-dropdown group" data-nav-dropdown>
                        <button type="button" class="nav-dropdown-trigger {{ request()->routeIs('products.*') ? 'nav-link-active' : '' }}" aria-expanded="false">
                            <span>Продукция</span>
                            <svg class="nav-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <ul class="nav-dropdown-menu">
                            <li><a href="{{ route('products.index') }}" class="nav-dropdown-link {{ request()->routeIs('products.index') ? 'nav-dropdown-link-active' : '' }}">Вся продукция</a></li>
                            @foreach($navCategories as $category)
                                <li><a href="{{ route('products.category', $category->slug) }}" class="nav-dropdown-link {{ (request()->routeIs('products.category') && request()->route('slug') === $category->slug) || (request()->routeIs('products.show') && request()->route('categorySlug') === $category->slug) ? 'nav-dropdown-link-active' : '' }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('news.index') }}" class="nav-link {{ request()->routeIs('news.*') ? 'nav-link-active' : '' }}">Новости</a>
                    </li>

                    <li>
                        <a href="{{ route('liquidation.index') }}" class="nav-link {{ request()->routeIs('liquidation.*') ? 'nav-link-active' : '' }}">Реализация неликвидов</a>
                    </li>

                    <li class="nav-dropdown group" data-nav-dropdown>
                        <button type="button" class="nav-dropdown-trigger {{ request()->routeIs('appeals.*') ? 'nav-link-active' : '' }}" aria-expanded="false">
                            <span>Электронные обращения</span>
                            <svg class="nav-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <ul class="nav-dropdown-menu">
                            <li><a href="{{ route('appeals.citizens') }}" class="nav-dropdown-link {{ request()->routeIs('appeals.citizens*') ? 'nav-dropdown-link-active' : '' }}">Для граждан</a></li>
                            <li><a href="{{ route('appeals.business') }}" class="nav-dropdown-link {{ request()->routeIs('appeals.business*') ? 'nav-dropdown-link-active' : '' }}">Для юридических лиц и ИП</a></li>
                        </ul>
                    </li>

                    <li class="nav-dropdown group" data-nav-dropdown>
                        <button type="button" class="nav-dropdown-trigger {{ request()->routeIs('information.*') ? 'nav-link-active' : '' }}" aria-expanded="false">
                            <span>Информация</span>
                            <svg class="nav-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <ul class="nav-dropdown-menu">
                            <li><a href="{{ route('information.corruption') }}" class="nav-dropdown-link {{ request()->routeIs('information.corruption') ? 'nav-dropdown-link-active' : '' }}">Борьба с коррупцией</a></li>
                            <li><a href="{{ route('information.extremism') }}" class="nav-dropdown-link {{ request()->routeIs('information.extremism') ? 'nav-dropdown-link-active' : '' }}">Противодействие экстремизму</a></li>
                            <li><a href="{{ route('information.mchs') }}" class="nav-dropdown-link {{ request()->routeIs('information.mchs') ? 'nav-dropdown-link-active' : '' }}">МЧС</a></li>
                            <li><a href="{{ route('information.documents') }}" class="nav-dropdown-link {{ request()->routeIs('information.documents') ? 'nav-dropdown-link-active' : '' }}">Документы</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('contacts.index') }}" class="nav-link {{ request()->routeIs('contacts.*') ? 'nav-link-active' : '' }}">Контакты</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
