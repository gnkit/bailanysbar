<script>
    function app() {
        let buttons = document.querySelectorAll('.button');
        let contacts = document.querySelectorAll('.contact');

        function filter(category, items) {
            items.forEach((item) => {
                const isItemFiltered = !item.classList.contains(category);
                const isShowAll = category.toLowerCase() === 'all';
                if (isItemFiltered && !isShowAll) {
                    item.classList.add('anime');
                } else {
                    item.classList.remove('hide');
                    item.classList.remove('anime');
                }
            });
        }

        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                const currentCategory = button.dataset.filter;
                filter(currentCategory, contacts);
            })
        })

        contacts.forEach((contact) => {
            contact.ontransitionend = function () {
                if (contact.classList.contains('anime')) {
                    contact.classList.add('hide');
                }
            }
        });
    }

    app();
</script>

@if (request()->is('register'))
    <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.ready(function () {
                grecaptcha.execute('{{config('services.recaptcha.site_key')}}', {action: 'register'}).then(function (token) {
                    document.getElementById("g-recaptcha-response").value = token;
                    document.getElementById("register-form").submit();
                });
            });
        }
    </script>
@endif

@if (request()->is('/'))
    <script>
        const api = `{{ route('api.v1.contacts') }}`;
        const contacts = [];

        fetch(api)
            .then(res => res.json())
            .then(data => {
                console.log('data >>>> ', data);
                data.forEach(line => {
                    contacts.push(line);
                })
            });

        const searchInput = document.querySelector('.search');
        const searchOptions = document.querySelector('.options');

        if (searchOptions.firstChild) {
            searchOptions.style.display = 'none';
        }

        function getOptions(word, contacts) {
            return contacts.filter(contact => {
                const regex = new RegExp(word, 'gi');
                return contact.title.match(regex) ?? null;
            })
        }

        function displayOptions() {
            if (this.value === '') {
                searchOptions.style.display = 'none';
            } else {
                searchOptions.style.display = 'flex';
            }
            console.log('this.value >> ', this.value);
            const options = getOptions(this.value, contacts);
            console.log('this.options >> ', options);
            if (options.length < 1) {
                const htmlNotFound = `<div class="text-secondary">{{ __('Сіздің сұрауыңыз бойынша ештеңе табылмады.') }}</div>`;
                searchOptions.innerHTML = htmlNotFound;
            } else {

                const html = options
                    .map(contact => {
                        const regex = new RegExp(this.value, 'gi');
                        const contactTitle = contact.title.replace(regex,
                            `<span class="text-bg-danger">${this.value}</span>`
                        )

                        return `<a href="/contact/${contact.id}" class="link-secondary mb-2 text-decoration-none border-bottom">${contactTitle}</a>`;
                    })
                    .slice(0, 10)
                    .join('');
                searchOptions.innerHTML = html;

            }
        }

        searchInput.addEventListener('change', displayOptions);
        searchInput.addEventListener('keyup', displayOptions);
    </script>
@endif
