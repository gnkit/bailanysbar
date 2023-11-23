<div class="text-center">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <span class="mx-1 fi fi-{{ $locale_name }}"></span>
        @else
            <a class="text-decoration-none" href="/language/{{ $available_locale }}">
                <span class="mx-1 fi fi-{{ $locale_name }}"></span>
            </a>
        @endif
    @endforeach
</div>
