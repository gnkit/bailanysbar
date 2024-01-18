@guest

    <footer class="container mb-4">
        <ul class="nav justify-content-center mb-2">
            <li class="nav-item"><a href="{{ route('about') }}"
                                    class="nav-link px-2 text-muted">{{ __('messages.page_link_about') }}</a></li>
            <li class="nav-item"><a href="{{ route('guide') }}"
                                    class="nav-link px-2 text-muted">{{ __('messages.page_link_guide') }}</a>
            </li>
            <li class="nav-item"><a href="{{ route('pricing') }}"
                                    class="nav-link px-2 text-muted">{{ __('messages.page_link_price') }}</a></li>
            <li class="nav-item"><a href="{{ route('privacy') }}"
                                    class="nav-link px-2 text-muted">{{ __('messages.page_link_privacy') }}</a></li>
        </ul>

        <div class="text-center text-muted">© {{ date('Y') }} {{ __('Bailanys Bar') }}</div>
    </footer>

@endguest
