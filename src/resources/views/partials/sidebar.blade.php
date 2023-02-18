<div class="col-sm-3 bg-white p-2">
    <div class="d-flex flex-column flex-shrink-0">
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="{{ route('dashboard') }}"
                   class="nav-link link-dark {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-gauge-high"></i>
                    {{ __('Dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('contacts.index') }}"
                   class="nav-link link-dark {{ request()->is('contacts/*') || request()->is('contacts') ? 'active' : '' }}">
                    <i class="fa-solid fa-mobile-screen"></i>
                    {{ __('Contacts') }}
                </a>
            </li>
            @role('manager')
            <li>
                <a href="{{ route('categories.index') }}"
                   class="nav-link link-dark {{ request()->is('categories/*') || request()->is('categories') ? 'active' : '' }}">
                    <i class="fa-solid fa-clipboard-list"></i>
                    {{ __('Categories') }}
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}" class="nav-link link-dark {{ request()->is('users/*') || request()->is('users') ? 'active' : '' }}">
                    <i class="fa-solid fa-user"></i>
                    {{ __('Users') }}
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="fa-solid fa-passport"></i>
                    {{ __('Roles') }}
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="fa-solid fa-shield-halved"></i>
                    {{ __('Permissions') }}
                </a>
            </li>
            @endrole
            <li>
                <a href="{{ route('setting') }}"
                   class="nav-link link-dark {{ request()->is('setting') ? 'active' : '' }}" class="nav-link link-dark">
                    <i class="fa-solid fa-circle-user"></i>
                    {{ __('Account') }}
                </a>
            </li>
        </ul>
    </div>
</div>
