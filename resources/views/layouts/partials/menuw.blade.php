<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
        <a href="{{url('/')}}" class="navbar-brand text-info fw-semibold fs-4 mx-5">
            <img class="img-fluid" src="{{asset('dist/img/logo.png')}}" alt="logo" height="60px" width="130px">
        </a>

        {{-- nav button --}}
        <button class="navbar-toggler" type="button"
        data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
        <span class="navbar-toggler-icon"></span>
        </button>
        <section class="offcanvas offcanvas-start " id="menuLateral" tabindex="-1">
            <div class="offcanvas-header" data-bs-theme="dark">
                <h5 class="offcanvas-title  text-info">emprememos</h5>
                <button class="btn-close" type="button" aria-label="close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column justify-content-between px-0">
                <ul class="navbar-nav fs-5 justify-content-evenly flex-grow-1">
                    <li class="nav-item p-3 py-md-1"><a  class="nav-link" href="{{url('/')}}">Home</a></li>
                    <li class="nav-item p-3 py-md-1"><a class="nav-link"  href="{{ url('/producto')}}">Productos</a></li>
                    <li class="nav-item p-3 py-md-1"><a  class="nav-link" href="{{ url('/contact')}}">Contact</a></li>
                    <li class="nav-item p-3 py-md-1"><a  class="nav-link" href="{{ url('/nosotros')}}">Nosotros</a></li>
                </ul>
                <div  class="d-lg-none align-self-center py-3">
                    <a href=""><i class="bi bi-twitter px-2 text-info fs-2"></i></a>
                    <a href=""><i class="bi bi-facebook px-2 text-info fs-2"></i></a>
                    <a href=""><i class="bi bi-github px-2 text-info fs-2"></i></a>
                    <a href=""><i class="bi bi-whatsapp px-2 text-info fs-2"></i></a>
                </div>
            </div>
        </section>
    </div>
</nav>
