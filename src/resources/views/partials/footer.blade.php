<footer class="mt-4">
    <ul class="nav justify-content-center">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link px-2 text-muted">{{ __('Home') }}</a></li>
        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link px-2 text-muted">{{ __('About') }}</a></li>
        <li class="nav-item"><a href="{{ route('guide') }}" class="nav-link px-2 text-muted">{{ __('Guide') }}</a></li>
        <li class="nav-item"><a href="{{ route('pricing') }}" class="nav-link px-2 text-muted">{{ __('Pricing') }}</a></li>
        <li class="nav-item"><a href="{{ route('privacy') }}" class="nav-link px-2 text-muted">{{ __('Privacy') }}</a></li>
    </ul>
    <hr>
    <p class="text-center text-muted">© {{ date('Y') }} {{ __('Bailanys Bar') }}</p>
</footer>

@include('partials.scripts')
