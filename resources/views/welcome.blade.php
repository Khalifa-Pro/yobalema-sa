<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
        <link rel="stylesheet" href="css/styleCaroussel.css">
    </head>
    <body class="antialiased" style="">
        <script src="/js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <nav class="navbar navbar-expand-lg bg-dark shadow-lg p-3 mb-5">
            <div class="container-fluid">
              <a class="navbar-brand" style="font-weight:bold;font-size: 30px;" href="#">
                <img width="130" height="50" src="./build/assets/images/yobalema.png" alt="">
                </a>
              @if (Route::has('login'))
                <div style="padding-right:30px">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:t">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" style="color: black;text-decoration:none; margin-right: 20px;font-weight:bold;">
                            <button class="btn btn-outline-primary">Se connecter</button>
                        </a>
                        {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" style="color: black;text-decoration: none;font-weight:bold;">
                            <button class="btn btn-outline-primary">S'inscrire</button>
                        </a>
                        @endif --}}
                    @endauth
                </div>
            @endif
            </div>
        </nav>
        <div class="loader"></div>
        <div class="home-slider owl-carousel js-fullheight" style="margin-top: -50px">
            <div class="slider-item js-fullheight" style="background-image:url(./build/assets/images/slider-1.jpg);">
                <div class="overlay"></div>
              <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">
                            <h2>meilleure voiture pour voyager</h2>
                          <h1 class="mb-3">Dakar</h1>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
      
            <div class="slider-item js-fullheight" style="background-image:url(./build/assets/images/slider-2.jpg);">
                <div class="overlay"></div>
              <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">
                            <h2>meilleure voiture pour voyager</h2>
                          <h1 class="mb-3">Thies</h1>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
      
            <div class="slider-item js-fullheight" style="background-image:url(./build/assets/images/slider-2.jpg);">
                <div class="overlay"></div>
              <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">
                            <h2>meilleure voiture pour voyager</h2>
                          <h1 class="mb-3">Saint-Louis</h1>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>

          
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
