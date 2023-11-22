<div class="fixed-bottom py-2 bg-dark text-center">
    <div class="btn-group">
        <a class="btn btn-dark border-0 text-decoration-none px-4 py-3" href="{{ route('dashboard') }}">
            <i class="fa-regular fa-chart-bar fa-xl py-2"></i>
        </a>
        <a class="btn btn-dark border-0 text-decoration-none px-4 py-3" href="{{ route('contacts.index') }}">
            <i class="fa-solid fa-paperclip fa-xl py-2"></i>
        </a>
        <a class="btn btn-dark border-0 text-decoration-none px-4 py-3" href="{{ route('contacts.create') }}">
            <i class="fa-solid fa-plus fa-xl py-2"></i>
        </a>
        <a class="btn btn-dark border-0 text-decoration-none px-4 py-3" href="{{ route('settings') }}">
            <i class="fa-solid fa-gear fa-xl py-2"></i>
        </a>
        <a class="btn btn-dark border-0 text-decoration-none px-4 py-3" href="{{ route('logout') }}" onclick=" event.preventDefault();
               document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-arrow-right-from-bracket fa-xl py-2"></i>
        </a>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
