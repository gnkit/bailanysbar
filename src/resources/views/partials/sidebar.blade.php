@role('manager')
    <div class="col-2 d-flex flex-column flex-shrink-0 p-2 text-white bg-dark">
        <nav class="navbar navbar-expand-sm">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex flex-column flex-shrink-0 w-100">
                    <div class="logo text-center">
                        <a class="navbar-brand text-white" href="{{ url('/') }}">
                            {{ config('app.name', 'BailanysBar') }}
                        </a>
                    </div>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                               class="nav-link {{ request()->is('user/dashboard') ? 'active' : 'link-light' }}">
                                <i class="fa-regular fa-chart-bar"></i>
                                {{ __('messages.dashboard') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contacts.index') }}"
                               class="nav-link {{ request()->is('user/contacts/*') || request()->is('user/contacts') ? 'active' : 'link-light' }}">
                                <i class="fa-solid fa-paperclip"></i>
                                {{ __('messages.contacts') }}
                                @if(0 < count(auth()->user()->unreadNotifications))
                                    @role('manager')
                                    <span class="badge rounded-pill bg-warning text-dark float-end">
                                        {{ count(auth()->user()->unreadNotifications) }}
                                    </span>
                                    @endrole
                                @endif
                            </a>
                        </li>
                        @role('manager')
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}"
                               class="nav-link {{ request()->is('user/categories/*') || request()->is('user/categories') ? 'active' : 'link-light' }}">
                                <i class="fa-regular fa-bookmark"></i>
                                {{ __('messages.categories') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tickets.index') }}"
                               class="nav-link {{ request()->is('user/tickets/*') || request()->is('user/tickets') ? 'active' : 'link-light' }}">
                                <i class="fa-solid fa-ticket"></i>
                                {{ __('messages.tickets') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                               class="nav-link {{ request()->is('user/users/*') || request()->is('user/users') ? 'active' : 'link-light' }}">
                                <i class="fa-regular fa-user"></i>
                                {{ __('messages.users') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"
                               class="nav-link {{ request()->is('user/roles/*') || request()->is('user/roles') ? 'active' : 'link-light' }}">
                                <i class="fa-regular fa-pen-to-square"></i>
                                {{ __('messages.roles') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}"
                               class="nav-link {{ request()->is('user/permissions/*') || request()->is('user/permissions') ? 'active' : 'link-light' }}">
                                <i class="fa-solid fa-shield-halved"></i>
                                {{ __('messages.permissions') }}
                            </a>
                        </li>
                        @endrole
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                           id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-regular fa-circle-user ms-3 me-1"></i>
                            <strong>{{ auth()->user()->name ?? '' }}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1"
                            style="">
                            <li class="dropdown-item">
                                <a href="{{ route('settings') }}"
                                   class="nav-link {{ request()->is('user/settings') ? 'active' : 'link-light' }}">
                                    <i class="fa-solid fa-gear"></i>
                                    {{ __('messages.settings') }}
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="dropdown-item">
                                <a href="{{ route('logout') }}"
                                   class="nav-link link-light" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    {{ __('messages.logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>
    </div>
@endrole
