<div class="col-sm-3 bg-white p-2">
    <div class="d-flex flex-column flex-shrink-0">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                   class="nav-link {{ request()->is('dashboard') ? 'active' : 'link-dark' }}">
                    <i class="fa-regular fa-chart-bar"></i>
                    {{ __('Dashboard') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contacts.index') }}"
                   class="nav-link {{ request()->is('contacts/*') || request()->is('contacts') ? 'active' : 'link-dark' }}">
                    <i class="fa-solid fa-paperclip"></i>
                    {{ __('Contacts') }}
                </a>
            </li>
            @role('manager')
            <li class="nav-item">
                <a href="{{ route('categories.index') }}"
                   class="nav-link {{ request()->is('categories/*') || request()->is('categories') ? 'active' : 'link-dark' }}">
                    <i class="fa-regular fa-bookmark"></i>
                    {{ __('Categories') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}"
                   class="nav-link {{ request()->is('users/*') || request()->is('users') ? 'active' : 'link-dark' }}">
                    <i class="fa-regular fa-user"></i>
                    {{ __('Users') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('roles.index') }}"
                   class="nav-link {{ request()->is('roles/*') || request()->is('roles') ? 'active' : 'link-dark' }}">
                    <i class="fa-regular fa-pen-to-square"></i>
                    {{ __('Roles') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('permissions.index') }}"
                   class="nav-link {{ request()->is('permissions/*') || request()->is('permissions') ? 'active' : 'link-dark' }}">
                    <i class="fa-solid fa-shield-halved"></i>
                    {{ __('Permissions') }}
                </a>
            </li>
            @endrole
            <li class="nav-item">
                <a href="{{ route('setting') }}"
                   class="nav-link {{ request()->is('setting') ? 'active' : 'link-dark' }}">
                    <i class="fa-regular fa-circle-user"></i>
                    {{ __('Account') }}
                </a>
            </li>
        </ul>
    </div>
</div>
