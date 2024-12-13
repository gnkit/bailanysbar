<div class="text-center">
    @foreach ($available_locales as $locale_name => $available_locale)
        @if ($available_locale === $current_locale)
            <span class="mx-1 text-dark">{{ $locale_name === 'kz' ? 'қаз' : 'рус' }}</span>
        @else
            <a class="text-decoration-none" href="/language/{{ $available_locale }}">
                <span class="mx-1 text-secondary">{{ $locale_name === 'kz' ? 'қаз' : 'рус' }}</span>
            </a>
        @endif
        @if (!$loop->last)
        |
        @endif
    @endforeach
</div>
