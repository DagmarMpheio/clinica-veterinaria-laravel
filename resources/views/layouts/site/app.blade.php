<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="VetCarePro" name="keywords">
    <meta content="VetCarePro" name="description">

    <!-- Favicon -->
    <link href="img/app-logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/regular.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!--Toast-->
    <link rel="stylesheet" href="toastr/toastr.min.css">

    @yield('style')
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid border-bottom d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-4 text-center py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Nosso Escritório</h6>
                        <span>Sra. do Monte</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center border-start border-end py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Email</h6>
                        <span>vetcarepro@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Contacte-nos</h6>
                        <span>+244 923 345 094</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.html" class="navbar-brand ms-lg-5">
            <h1 class="m-0 text-uppercase text-dark"><i class="fa-solid fa-paw fs-1 text-primary me-3"></i>Vet Care Pro
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/"
                    class="nav-item nav-link {{ request()->route()->getName() == 'inicio' ? 'active' : '' }}">Home</a>
                <a href="{{ route('about-us') }}"
                    class="nav-item nav-link {{ request()->route()->getName() == 'about-us' ? 'active' : '' }}">Sobre</a>
                <a href="{{ route('services') }}"
                    class="nav-item nav-link {{ request()->route()->getName() == 'services' ? 'active' : '' }}">Serviços</a>
                <a href="{{ route('products') }}"
                    class="nav-item nav-link {{ request()->route()->getName() == 'products' ? 'active' : '' }}">Produtos</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Minha Conta</a>
                    <div class="dropdown-menu m-0">
                        <!-- Links de Auntenticação -->
                        @guest
                            {{-- Carrinho de compras --}}
                            <a href="{{ route('shopping.cart') }}" class="dropdown-item">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrinho <span
                                    class="badge text-bg-danger">{{ count((array) session('cart')) }}</span>
                            </a>
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                            @endif
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="dropdown-item">Criar Conta</a>
                            @endif
                        @else
                            <a href="#" class="dropdown-item"> {{ Auth::user()->name }}</a>
                            <a href="{{ route('dashboard') }}" class="dropdown-item"> Dashboard</a>
                            {{-- Carrinho de compras --}}
                            <a href="{{ route('shopping.cart') }}" class="dropdown-item">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrinho <span
                                    class="badge text-bg-danger">{{ count((array) session('cart')) }}</span>
                            </a>
                            <hr>
                            <!-- Terminar Sessao -->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Terminar Sessão') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
                <a href="{{ route('contact-us') }}"
                    class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Contactos <i
                        class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Fale Connosco</h5>
                    <p class="mb-4">Conecte-se conosco para cuidados excepcionais ao seu pet!</p>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>Sra. do Monte</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>vetcarepro@gmail.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+244 923 345 094</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Links Rápidos</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="{{ route('inicio') }}"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-body mb-2" href="{{ route('about-us') }}"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Sobre</a>
                        <a class="text-body mb-2" href="{{ route('services') }}"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Nossos Serviços</a>
                        <a class="text-body" href="{{ route('contact-us') }}"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Contacte-nos</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Popular Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="{{ route('inicio') }}"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-body mb-2" href="{{ route('about-us') }}"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Sobre</a>
                        <a class="text-body mb-2" href="{{ route('services') }}"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Nossos Serviços</a>
                        <a class="text-body" href="{{ route('contact-us') }}"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Contacte-nos</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Newsletter</h5>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Seu email">
                            <button class="btn btn-primary">Inscreva-se</button>
                        </div>
                    </form>
                    <h6 class="text-uppercase mt-4 mb-3">Siga-nos</h6>
                    <div class="d-flex">
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i
                                class="bi bi-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i
                                class="bi bi-facebook"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i
                                class="bi bi-linkedin"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="#"><i
                                class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="col-12 text-center text-body">
                    <a class="text-body" href="#">Termos e Condições</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Politicas de Privacidade</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Apoio ao Cliente </a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Pagamentos</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Ajuda</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">FAQs</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white" href="#">VetCarePro</a>. Todos Direitos
                        Reservados.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-white" href="https://htmlcodex.com">HTML Codex</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!--Toast-->
    <script src="toastr/toastr.min.js"></script>
    <script src="toastr/toastr-lima.js"></script>

    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}', 'Sucesso');
        </script>
    @elseif(session('error-message'))
        <script>
            toastr.error('{{ session('error-message') }}', 'Erro');
        </script>
    @endif

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    @yield('scripts')
</body>

</html>
