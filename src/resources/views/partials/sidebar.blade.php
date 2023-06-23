<div class="col-sm-3 bg-light p-4">
    <nav class="navbar navbar-expand-sm">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex flex-column flex-shrink-0 w-100">
                <div class="logo text-center m-2 p-2">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'BailanysBar') }}
                    </a>
                </div>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <span class="nav-link link-dark">
                            <i class="fa-regular fa-circle-user"></i>
                            {{ auth()->user()->name ?? '' }}
                        </span>
                    </li>

                    <hr>

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                           class="nav-link {{ request()->is('user/dashboard') ? 'active' : 'link-dark' }}">
                            <i class="fa-regular fa-chart-bar"></i>
                            {{ __('Dashboard') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contacts.index') }}"
                           class="nav-link {{ request()->is('user/contacts/*') || request()->is('user/contacts') ? 'active' : 'link-dark' }}">
                            <i class="fa-solid fa-paperclip"></i>
                            {{ __('Contacts') }}
                            @role('manager')
                                <span class="badge rounded-pill bg-warning text-dark float-end">{{ count(auth()->user()->unreadNotifications) }}</span>
                            @endrole
                        </a>
                    </li>
                    @role('manager')
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}"
                           class="nav-link {{ request()->is('user/categories/*') || request()->is('user/categories') ? 'active' : 'link-dark' }}">
                            <i class="fa-regular fa-bookmark"></i>
                            {{ __('Categories') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                           class="nav-link {{ request()->is('user/users/*') || request()->is('user/users') ? 'active' : 'link-dark' }}">
                            <i class="fa-regular fa-user"></i>
                            {{ __('Users') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}"
                           class="nav-link {{ request()->is('user/roles/*') || request()->is('user/roles') ? 'active' : 'link-dark' }}">
                            <i class="fa-regular fa-pen-to-square"></i>
                            {{ __('Roles') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('permissions.index') }}"
                           class="nav-link {{ request()->is('user/permissions/*') || request()->is('user/permissions') ? 'active' : 'link-dark' }}">
                            <i class="fa-solid fa-shield-halved"></i>
                            {{ __('Permissions') }}
                        </a>
                    </li>

                    <hr>

                    @endrole
                    <li class="nav-item">
                        <a href="{{ route('setting') }}"
                           class="nav-link {{ request()->is('user/setting') ? 'active' : 'link-dark' }}">
                            <i class="fa-solid fa-gear"></i>
                            {{ __('Setting') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}"
                           class="nav-link link-dark " onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();
                   ">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
