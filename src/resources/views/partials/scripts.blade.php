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
            contact.ontransitionend = function() {
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
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                    action: 'register'
                }).then(function(token) {
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
                const htmlNotFound =
                    `<div class="text-secondary">{{ __('Сіздің сұрауыңыз бойынша ештеңе табылмады.') }}</div>`;
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

@if (request()->is('user/contacts/*'))
    <script>
        var $modal = $('#modal');
        var avatar = $('#avatar')[0];
        var cropper;
        console.log('avatar');

        var file;
        /** Image Change Event **/
        $("body").on("change", ".avatar", function(e) {
            var files = e.target.files;
            console.log(files);
            var done = function(url) {
                avatar.src = url;
                $modal.modal('show');
            };
            var reader;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                console.log(file['type']);
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        /** Show Model Event **/
        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(avatar, {
                aspectRatio: 1,
                viewMode: 1,
                preview: '.preview',
                cropBoxResizable: false,
                minCropBoxWidth: 300,
                minCropBoxHeight: 300,
                dragMode: 'move',
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });
        /** Crop Button Click Event **/
        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 300,
                height: 300,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    console.log(base64data);
                    $("input[name='image']").val(base64data);
                    $(".show-avatar").show();
                    $(".show-avatar").attr("src", base64data);
                    $("#modal").modal('toggle');
                }
            }, file['type']);
        });
    </script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var splide = new Splide('.splide', {
            type: 'loop',
            autoplay: true,
            interval: 5000,
            perPage: 3,
            gap: '0.5rem',
            pagination: false,
            arrows: false,
            breakpoints: {
                640: {
                    perPage: 2,
                },
            }
        });
        splide.mount();
    });
</script>
