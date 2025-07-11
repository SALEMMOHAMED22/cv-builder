    <header>
        <!-- header inner -->
        <div class="head_top">
            <div class="header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                            <div class="full">
                                <div class="center-desk">
                                    <div class="logo">
                                        <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarsExample04">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"> Home </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Contact</a>
                                        </li>
                                        @auth
                                         <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.cv') }}">CV Panel</a>
                                        </li>
                                         <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.logout') }}">Log Out</a>
                                        </li>
                                            
                                        @else
                                         <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">Log In</a>
                                        </li>
                                        @endauth
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header inner -->
            <!-- end header -->
            <!-- banner -->
            <section class="banner_main">
                <div class="container-fluid">
                    <div class="row d_flex">
                        <div class="col-md-6">
                            <div class="text-bg">
                                <h1>Create your Cv</h1>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of a
                                    page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                    more-or-less
                                    normal distribution of letters,</p>
                                    @auth
                                        
                                    <a href="{{ route('user.cv') }}">Start Now</a>

                                    @else
                                    <a href="{{ route('login') }}">Start Now</a>
                                    @endauth
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-img">
                                <figure><img src="{{ asset('frontend/images/side.png') }}" alt="#" /></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </header>
