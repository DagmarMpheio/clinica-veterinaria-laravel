@extends('layouts.site.app')

@section('title') Serviços @endsection

@section('content')
<!-- Services Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">Serviços</h6>
            <h1 class="display-5 text-uppercase mb-0">Nossos Serviços Cuidado de Animais</h1>
        </div>
        <div class="row g-5">
            <div class="col-md-6">
                <div class="service-item bg-light d-flex p-4">
                    <i class="flaticon-house display-1 text-primary me-4"></i>
                    <div>
                        <h5 class="text-uppercase mb-3">Embarque de Aminais de Estimação</h5>
                        <p>Embarque seguro e confortável para seus animais de estimação</p>
                        <a class="text-primary text-uppercase" href="#">Ler Mais<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-item bg-light d-flex p-4">
                    <i class="flaticon-food display-1 text-primary me-4"></i>
                    <div>
                        <h5 class="text-uppercase mb-3">Alimentação de Animais</h5>
                        <p>Fornecemos a alimentação ideal para o bem-estar completo dos seus animais de estimação</p>
                        <a class="text-primary text-uppercase" href="#">Ler Mais<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-item bg-light d-flex p-4">
                    <i class="flaticon-grooming display-1 text-primary me-4"></i>
                    <div>
                        <h5 class="text-uppercase mb-3">Tosquia de Animais</h5>
                        <p>Transformamos a tosquia de animais em momentos de cuidado e conforto</p>
                        <a class="text-primary text-uppercase" href="#">Ler Mais<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-item bg-light d-flex p-4">
                    <i class="flaticon-cat display-1 text-primary me-4"></i>
                    <div>
                        <h5 class="text-uppercase mb-3">Treino de Animais</h5>
                        <p>Oferecemos treino dedicado para fortalecer a relação entre você e seu animal de estimação</p>
                        <a class="text-primary text-uppercase" href="#">Ler Mais<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-item bg-light d-flex p-4">
                    <i class="flaticon-dog display-1 text-primary me-4"></i>
                    <div>
                        <h5 class="text-uppercase mb-3">Exercício Para Animais</h5>
                        <p>Promovemos a saúde e alegria dos seus animais por meio de programas de exercícios personalizados</p>
                        <a class="text-primary text-uppercase" href="#">Ler Mais<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-item bg-light d-flex p-4">
                    <i class="flaticon-vaccine display-1 text-primary me-4"></i>
                    <div>
                        <h5 class="text-uppercase mb-3">Tratamento de Animais</h5>
                        <p>Comprometidos com o tratamento amoroso e especializado para a saúde e felicidade dos seus animais de estimação</p>
                        <a class="text-primary text-uppercase" href="#">Ler Mais<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->

<!-- Testimonial Start -->
<div class="container-fluid bg-testimonial py-5" style="margin: 45px 0;">
    <div class="container py-5">
        <div class="row justify-content-end">
            <div class="col-lg-7">
                <div class="owl-carousel testimonial-carousel bg-white p-5">
                    <div class="testimonial-item text-center">
                        <div class="position-relative mb-4">
                            <img class="img-fluid mx-auto" src="img/testimonial-1.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                                <i class="bi bi-chat-square-quote text-primary"></i>
                            </div>
                        </div>
                        <p>Adorei a atenção personalizada que recebemos. A equipe é incrível e meu animal de estimação sempre sai feliz das consultas.</p>
                        <hr class="w-25 mx-auto">
                        <h5 class="text-uppercase">Érica de Jesus</h5>
                        <span>Prefessora</span>
                    </div>
                    <div class="testimonial-item text-center">
                        <div class="position-relative mb-4">
                            <img class="img-fluid mx-auto" src="img/testimonial-2.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                                <i class="bi bi-chat-square-quote text-primary"></i>
                            </div>
                        </div>
                        <p>Serviço excepcional! Resolveram uma emergência rapidamente. Recomendo a todos os tutores!</p>
                        <hr class="w-25 mx-auto">
                        <h5 class="text-uppercase">Marcos Antunes</h5>
                        <span>Advogado</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
@endsection