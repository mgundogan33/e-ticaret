<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container d-flex">
            <div class="row m-auto">
                <div class="col-md-2">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/logo.png" alt="#" class="w-100" /></a>
                </div>
                <div class="col-md-10">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/') }}">Anasayfa <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="about.html">Hakkımda</a></li>
                                    <li><a href="testimonial.html">Testimonial</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('products') }}">Ürünler</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="blog_list.html">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">İletişim</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('show_cart') }}">Sepet</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('show_order') }}">Sipariş</a>
                            </li>
                            <form class="form-inline d-block">

                                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                            @if (Route::has('login'))
                                @auth

                                    <li class="nav-item">
                                        <x-app-layout>

                                        </x-app-layout>

                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="btn btn-primary" href="{{ url('/login') }}" id="logincss">Giriş</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="btn btn-success" href="{{ route('register') }}">Kayıt Ol</a>
                                    </li>
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
