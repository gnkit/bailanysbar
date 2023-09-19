<div class="d-block d-sm-none container fixed-bottom mb-2">
    <div class="flex text-white p-4">
        <a class="btn btn-success border-0 text-decoration-none p-3" href="{{ route('dashboard') }}">
            <i class="fa-regular fa-chart-bar fa-xl "></i>
        </a>
        <a class="btn btn-success border-0 text-decoration-none p-3" href="{{ route('contacts.index') }}">
            <i class="fa-solid fa-paperclip fa-xl py-2"></i>
        </a>
        <a class="btn btn-success border-0 text-decoration-none p-3" href="{{ route('contacts.create') }}">
            <i class="fa-solid fa-plus fa-xl py-2"></i>
        </a>
        <a class="btn btn-success border-0 text-decoration-none p-3" href="{{ route('setting') }}">
            <i class="fa-solid fa-gear fa-xl py-2"></i>
        </a>
        <a class="btn btn-success border-0 text-decoration-none p-3" href="{{ route('logout') }}" onclick=" event.preventDefault();
               document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-arrow-right-from-bracket fa-xl py-2"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
