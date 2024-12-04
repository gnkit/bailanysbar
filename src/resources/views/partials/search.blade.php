<div class="mb-4">
    <div class="row">
        <div class="col-lg-6 ms-auto me-auto">
            <div class="input-group rounded border">
                <span class="input-group-text bg-light border-0" id="search-addon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>

                <input type="search" class="search form-control rounded border-0" placeholder="{{ __('messages.search_contacts') }}"
                       name="search" id="search"
                       aria-label="Search"
                       aria-describedby="search-addon">
            </div>
            <div class="position-relative">
                <div class="options position-absolute w-100 card p-4 my-4 overflow-scroll"
                     id="options" style="max-height: 20rem; z-index:1000">
                </div>
            </div>
        </div>
    </div>
</div>
