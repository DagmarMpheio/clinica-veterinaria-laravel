<nav id="sidebar" class="sidebar js-sidebar"  style="background-color:#000">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">Dashboard</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Páginas
            </li>

            <li class="sidebar-item {{ request()->route()->getName() == 'dashboard'? 'active-green': '' }}">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            
            <li class="sidebar-item {{ request()->route()->getName() == 'backend.users.index' ||request()->route()->getName() == 'backend.users.edit' ||request()->route()->getName() == 'backend.users.create'? 'active-green': '' }}">
                <a class="sidebar-link" href="{{ route('backend.users.index') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Usuários</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->route()->getName() == 'backend.products.index' ||request()->route()->getName() == 'backend.products.edit' ||request()->route()->getName() == 'backend.products.create'? 'active-green': '' }}">
                <a class="sidebar-link" href="{{ route('backend.products.index') }}">
                    <i class="align-middle" data-feather="folder"></i> <span class="align-middle">Produtos</span>
                </a>
            </li>


            <li class="sidebar-item {{ request()->route()->getName() == 'backend.animals.index' ||request()->route()->getName() == 'backend.animals.edit' ||request()->route()->getName() == 'backend.animals.create'? 'active-green': '' }}">
                <a class="sidebar-link" href="{{ route('backend.animals.index') }}">
                    <i class="align-middle" data-feather="twitter"></i> <span class="align-middle">Animais</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->route()->getName() == 'backend.orders.index'? 'active-green': '' }}">
                <a class="sidebar-link" href="{{ route('backend.orders.index') }}">
                    <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">Pedidos</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->route()->getName() == 'backend.appointments.index'||request()->route()->getName() == 'backend.appointments.edit' ||request()->route()->getName() == 'backend.appointments.create' ? 'active-green': '' }}">
                <a class="sidebar-link" href="{{ route('backend.appointments.index') }}">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Agendamentos</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->route()->getName() == 'backend.feedbacks.index'||request()->route()->getName() == 'backend.feedbacks.edit' ||request()->route()->getName() == 'backend.feedbacks.create' ? 'active-green': '' }}">
                <a class="sidebar-link" href="{{ route('backend.feedbacks.index') }}">
                    <i class="align-middle" data-feather="alert-circle"></i> <span class="align-middle">Feedbacks</span>
                </a>
            </li>
            

            <li class="sidebar-header">
                Site
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Home</span>
                </a>
            </li>

            <li class="sidebar-header">
                Conta
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Terminar
                        Sessão</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>


        </ul>
    </div>
</nav>
