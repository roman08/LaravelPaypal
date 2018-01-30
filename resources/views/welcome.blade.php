<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

           
    .producto{
        position: relative;
    }
    .pull-down {
        position: absolute;
        bottom: 4px;
    }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    PROSIM
                </div>
                                    <div class="clearfix visible-sm-block"></div>
                    <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
                        <a href="work.html">
                            <img src="/storage/planes/September2017/Plan basico1.png" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                            <h3 class="fh5co-work-title">Work Title Here</h3>
                            <p>Web, Packaging, Branding</p>
                        </a>
                    </div>
                <!-- /// aqui va codigo prueba-->
                <!-- /// aqui va codigo prueba-->
                <!-- /// aqui va codigo prueba-->
                @foreach($planes as $p)
                    <div>
                        <p class="card-text descrip">
                            <spam itemprop="description">{{ $p['tipoplan']}} </spam>
                            @foreach($servicios as $s)
                                @if($p['id'] == $s['plan_id'])
                                     <spam itemprop="description">{{ $s['descripcion']}} </spam>
                                @endif
                            @endforeach

                        </p>
                    </div>
                @endforeach
                <!-- /// aqui va codigo prueba-->
                <!-- /// aqui va codigo prueba-->
                <div class="container">
                    <div class="row">
                           
                            <div class="row">
                                
                                        <div class="col-md-3 col-sm-2 col-xs-1">
                                                           <div class="thumbnail producto">
                    <a  href="#" class="">
                        <img  id="img" itemprop="image" class="card-img-top" src="/storage/planes/September2017/Plan basico1.png">
                    </a>
                    <div class="" itemscope itemtype="http://schema.org/Product">
                        <div class="">
                            <!-- nombre -->
                            <div>
                                <div class="h4">
                                    <spam itemprop="name">Prueba</spam>
                                </div>
                            </div>
                           
                                <!-- breve descripciom -->
                                <div>
                                    <p class="card-text descrip">
                                        <spam itemprop="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora debitis reprehenderit amet consequatur cupiditate nostrum voluptas unde ipsa magni ea, dignissimos earum beatae, mollitia inventore consectetur sed.</spam>
                                    </p>
                                </div>

                                <!-- precio/costo -->

                                <ul class="hidden list-group list-group-flush text-center">
                                    <!-- organizacion -->
                                    <div class="">
                                        <li class="list-group-item">
                                            <i class="icon-ok text-danger"></i>
                                            Organización:
                                            <span itemprop="manufacturer">prosin</span>
                                        </li>
                                    </div>
                                    <!-- calificacion del producto -->
                                    <div class="hidden" itemscope itemtype="https://schema.org/Rating">
                                        <li class="list-group-item">Calificación:
                                            <span itemprop="ratingValue">4</span>
                                        </li>
                                        <div>
                                            <li class="list-group-item">Calificacion mas alta
                                                <span itemprop="bestRating">5</span>
                                            </li>
                                        </div>
                                        <div>
                                            <li class="list-group-item">Calificacion mas baja
                                                <span itemprop="worstRating">4</span>
                                            </li>
                                        </div>
                                    </div>
                                </ul>

                                </div>

                                <div class="container-fluid botones">
                                    <div class="row">
                                            <a class="btn btn-info" role="presentation" href="/">Saber mas...</a>
                                            <a href="/" class="btn btn-success" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                <span class="" itemprop="priceCurrency" content="200"></span>
                                                $ <span itemprop="price">200</span>
                                            </a>
                                            <a id="btn-comprar" href="/orden/agregar" data-id="" class="btn btn-primary">
                                                <i class="fa fa-shopping-bag">egregar</i>
                                            </a>
                                    </div>

                                </div>


                            </div>

                        </div>
                                        </div>
                                
                            </div>
                        
                    </div>
                </div>








                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
      
            <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="/js/bootstrap.js"></script>
                <script>
        $(window).load(function() {
            //Iguala las alturas de las tarjetas
            $('.producto').matchHeight({
                byRow: true,
                property: 'height',
                target: null,
                remove: false
            });
            //Baja los botones internos de cada tarjeta al borde del contenedor
            $('.botones').each(function () {
                var $this=$(this);
                $this.addClass('pull-down');
            });
        });
    </script>
    </body>
</html>
