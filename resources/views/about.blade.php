@extends('layouts.site.app')

@section('title') Sobre Nós @endsection

@section('content')
<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded" src="img/about.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="border-start border-5 border-primary ps-5 mb-5">
                    <h6 class="text-primary text-uppercase">Sobre Nós</h6>
                    <h1 class="display-5 text-uppercase mb-0">Mantemos Os Seus Animais de Estimação Sempre Felizes</h1>
                </div>
                <h4 class="text-body mb-4">Conte conosco para garantir o bem-estar e a alegria contínua dos seus companheiros peludos.</h4>
                <div class="bg-light p-4">
                    <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item w-50" role="presentation">
                            <button class="nav-link text-uppercase w-100 active" id="pills-1-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1"
                                aria-selected="true">Nossa Missão</button>
                        </li>
                        <li class="nav-item w-50" role="presentation">
                            <button class="nav-link text-uppercase w-100" id="pills-2-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2"
                                aria-selected="false">Nossa Visão</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                            <p class="mb-0" style="text-align: justify;">Nossa missão é proporcionar cuidado excepcional e promover o bem-estar dos animais de estimação, dedicando-nos a oferecer serviços de qualidade, atenção personalizada e uma experiência única que fortaleça os vínculos entre pets e seus tutores. Estamos comprometidos em criar um ambiente onde a saúde, a felicidade e a segurança dos animais sejam prioridade, contribuindo assim para uma vida plena e vibrante para os nossos amados amigos de quatro patas.</p>
                        </div>
                        <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                            <p class="mb-0" style="text-align: justify;">Nossa visão é ser referência no setor de cuidados para animais de estimação, buscando constantemente a excelência em serviços veterinários, bem-estar animal e relacionamento com os clientes. Almejamos ser reconhecidos como um destino confiável e acolhedor, onde a paixão pelos animais e a qualidade no atendimento se encontram. Visualizamos um futuro em que cada animal desfrute de uma vida saudável e feliz, e cada tutor se sinta parte de uma comunidade comprometida com o amor e respeito pelos pets.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Offer Start -->
<div class="container-fluid bg-offer my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5 justify-content-start">
            <div class="col-lg-7">
                <div class="border-start border-5 border-dark ps-5 mb-5">
                    <h6 class="text-dark text-uppercase">Oferta Especial</h6>
                    <h1 class="display-5 text-uppercase text-white mb-0">Poupe 50% em todos os artigos na sua primeira encomenda</h1>
                </div>
                <p class="text-white mb-4">Economize 50% em todos os artigos na sua primeira encomenda. Aproveite essa oferta especial para cuidar do seu animal de estimação com qualidade e economia!</p>
                <a href="#" class="btn btn-light py-md-3 px-md-5 me-3">Comprar Agora</a>
                <a href="#" class="btn btn-outline-light py-md-3 px-md-5">Ler Mais</a>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->

<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">Membros da Equipa</h6>
            <h1 class="display-5 text-uppercase mb-0">Profissionais qualificados para cuidar de animais</h1>
        </div>
        <div class="owl-carousel team-carousel position-relative" style="padding-right: 25px;">
            <div class="team-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                    <div class="team-overlay">
                        <div class="d-flex align-items-center justify-content-start">
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="bg-light text-center p-4">
                    <h5 class="text-uppercase">Magda Moisés</h5>
                    <p class="m-0">Veterinária Cirurgiã</p>
                </div>
            </div>
            <div class="team-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                    <div class="team-overlay">
                        <div class="d-flex align-items-center justify-content-start">
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="bg-light text-center p-4">
                    <h5 class="text-uppercase">Isabel Costa</h5>
                    <p class="m-0">Técnica em Radiologia</p>
                </div>
            </div>
            <div class="team-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                    <div class="team-overlay">
                        <div class="d-flex align-items-center justify-content-start">
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="bg-light text-center p-4">
                    <h5 class="text-uppercase">Camila Oliveira</h5>
                    <p class="m-0">Atendente Veterinária</p>
                </div>
            </div>
            <div class="team-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="img/team-4.jpg" alt="">
                    <div class="team-overlay">
                        <div class="d-flex align-items-center justify-content-start">
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="bg-light text-center p-4">
                    <h5 class="text-uppercase">Juliana Santos</h5>
                    <p class="m-0">Groomer</p>
                </div>
            </div>
            <div class="team-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="img/team-5.jpg" alt="">
                    <div class="team-overlay">
                        <div class="d-flex align-items-center justify-content-start">
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                            <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="bg-light text-center p-4">
                    <h5 class="text-uppercase">Fernanda Lima</h5>
                    <p class="m-0">Assistente de Laboratório</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

@endsection