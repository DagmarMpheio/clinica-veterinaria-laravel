@extends('layouts.site.app')

@section('title')
    Contacte-nos
@endsection

@section('content')
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Contacte-nos</h6>
                <h1 class="display-5 text-uppercase mb-0">Por favor sinta-se livre em contactar-nos</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-7">
                    <form method="POST" action="{{ route('backend.feedbacks.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="text" class="form-control bg-light border-0 px-4" placeholder="Seu Nome"
                                    name="name" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="email" class="form-control bg-light border-0 px-4" placeholder="Seu Email"
                                    name="email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control bg-light border-0 px-4"
                                    placeholder="Crítica ou Elogio" name="topic" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control bg-light border-0 px-4 py-3" rows="8" placeholder="Messagem" name="message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Enviar Messagem</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="bg-light mb-5 p-5">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Nosso Escritório</h6>
                                <span>Sra. do Monte</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Email</h6>
                                <span>vetcarepro@gmail.com</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Contacte-nos</h6>
                                <span>+244 923 345 094</span>
                            </div>
                        </div>
                        <div>
                            <iframe class="position-relative w-100"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.8732401870345!2d13.4328307!3d14.9377512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTTCsDE5JzEyLjYiUyAxM8KwNDInNTMuNCJF!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                                frameborder="0" style="height: 205px; border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
