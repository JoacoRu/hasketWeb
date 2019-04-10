<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <!-- BootsTrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Extra+Condensed|Kanit" rel="stylesheet">
    <title>Hasket Mu - Register</title>
</head>
<body>
    @include('partials.header')
    <section class="container-fluid">
        @include('modules.server_info')
        <section class="contentContainer">
            <div class="separator">
                <article class="downlaods" id="downloadIdWeb">
                    <div class="noticiaTitulo">
                        <h4>Descargas</h4>
                    </div>
                    <div class="systemRequiresContainer">
                        <div class="systemRequired">
                            <div class="tableSystem">
                                <div class="titleSystem">
                                    <p>Recursos</p>
                                </div>

                                <div class="rowTableSystem">                            
                                    <p>Procesador</p>
                                </div>

                                <div class="rowTableSystem">                            
                                    <p>RAM</p>
                                </div>

                                <div class="rowTableSystem">                            
                                    <p>Video</p>
                                </div>

                                <div class="rowTableSystem">                            
                                    <p>Conexión</p>
                                </div>

                                <div class="rowTableSystem">                            
                                    <p>Espacio en disco</p>
                                </div>
                            </div>

                            <div class="tableSystem">
                                <div class="titleSystem">
                                        <span>
                                            Mínimos
                                        </span>
                                    </div>

                                    <div class="rowTableSystem">
                                        <p>Pentium 3 - 1.0 Ghz</p>
                                    </div>

                                    <div class="rowTableSystem">
                                        <p>512 MB</p>
                                    </div>

                                    <div class="rowTableSystem">
                                        <p>128 MB</p>
                                    </div>

                                    <div class="rowTableSystem">
                                        <p>128k Conexión a Internet</p>
                                    </div>

                                    <div class="rowTableSystem">
                                        <p>650 MB</p>
                                    </div>
                                    
                            </div>

                            <div class="tableSystem">
                                <div class="titleSystem">
                                    <span>
                                        Recomendados
                                    </span>
                                </div>

                                <div class="rowTableSystem">
                                    <p>Pentium 4 - 2.4 Ghz (o superior)</p>
                                </div>

                                <div class="rowTableSystem">
                                    <p>1 GB (o superior)</p>
                                </div>

                                <div class="rowTableSystem">
                                    <p>256 MB (o superior)</p>
                                </div>

                                <div class="rowTableSystem">
                                    <p>Conexión de banda ancha</p>
                                </div>
                                
                                <div class="rowTableSystem">
                                    <p>1 GB (o superior)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="links">
                        <div class="cliente">
                            <div>
                                <h2>Cliente Full</h2>
                            </div>
                            <div class="descarga">
                                <a href="#"><img src="{{ asset('images/mega-icon.png') }}" alt="descarga mega"></a>
                                <a href="#"><img src="{{ asset('images/mediafire-icon.png') }}" alt="descarga mediafire"></a>
                            </div>
                        </div>

                        <div class="cliente">
                            <div>
                                <h2>Cliente sin sonido</h2>
                            </div>

                            <div class="descarga">
                                <a href="#"><img src="{{ asset('images/mega-icon.png') }}" alt="descarga mega"></a>
                                <a href="#"><img src="{{ asset('images/mediafire-icon.png') }}" alt="descarga mediafire"></a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            @include('modules.aside')
        </section>
        @include('partials.footer')
    </section>

    <!-- SCRIPTS BOOTSTRAP -->
    @include('partials.scripts_bootstrap')
    <!-- SCRIPTS -->
    <script src="{{ asset('js/home.js') }}"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2"></script>
</body>
</html>