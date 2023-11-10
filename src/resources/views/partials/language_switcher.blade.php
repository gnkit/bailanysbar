<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <span class="fi fi-{{ $locale_name }}"></span>
        @else
            <a class="text-decoration-none mx-1" href="/language/{{ $available_locale }}">
                <span class="fi fi-{{ $locale_name }}"></span>
            </a>
        @endif
    @endforeach
</div>
