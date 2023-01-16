<script type="text/javascript">

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
</script>
