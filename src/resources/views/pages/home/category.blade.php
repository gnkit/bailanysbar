@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container filter">
            <button class="button button" data-filter="all">Барлығы</button>
            <button class="button button" data-filter="${subcategory}">${subcategory}</button>
        </div>
        <div class="container contacts">
            <div class="row contact ${contact.subcategory}"
            <a data-bs-toggle="collapse" href="#socid" role="button" aria-expanded="false" aria-controls="socid">
                <h5 class="h5 text-light">
                    DFDccca
                </h5>
            </a>
            <hr>
            <div class="collapse" id="socid">
                <div class="socials">
                    <a href="tel:${contact.phone}" class="" target="_blank">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </a>
                    <a href="https://wa.me/${contact.whatsapp}" class="" target="_blank">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="https://ig.me/m/${contact.instagram}" class="" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://t.me/${contact.telegram}" class="" target="_blank">
                        <i class="fa-brands fa-telegram"></i>
                    </a>
                    <a href="https://${contact.site}" class="" target="_blank">
                        <i class="fa-brands fa-chrome"></i>
                    </a>
                    <a data-bs-toggle="collapse" href="#desid" role="button" aria-expanded="false"
                       aria-controls="desid">
                        <i class="fas fa-ellipsis-h"></i>
                    </a>
                </div>
            </div>
            <div class="collapse description" id="desid">
                <hr>
                <p><i class="fa-solid fa-user"></i>username</p>
                <p><i class="fa-solid fa-location-dot"></i>address</p>
                <p><i class="fa-solid fa-file-lines"></i>description</p>
            </div>
        </div>
    </div>
    </div>
@endsection
