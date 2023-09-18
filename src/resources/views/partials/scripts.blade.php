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
