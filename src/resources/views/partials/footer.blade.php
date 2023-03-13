<footer class="mt-2 fixed-bottom">
    <ul class="nav justify-content-center border-bottom pb-2 mb-2">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">{{ __('Home') }}</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">{{ __('Features') }}</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">{{ __('Pricing') }}</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">{{ __('FAQs') }}</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">{{ __('About') }}</a></li>
    </ul>
    <p class="text-center text-muted">© {{ date('Y') }} {{ __('Company, Inc') }}</p>
</footer>

@include('partials.scripts')
