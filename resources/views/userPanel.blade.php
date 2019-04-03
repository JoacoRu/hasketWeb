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
    <!-- SCRIPTS -->
    <title>Hasket Mu - Panel</title>
</head>
<body>
    @include('partials.header')
    <section class="container-fluid">
        @include('modules.server_info')
        <section class="contentContainer">
            <div class="separator">
                <article class="userPanelContainer">
                    <div class="noticiaTitulo">
                        <h4>Panel</h4>
                    </div>
                    <div class="menuPersonaje">
                        <ul class="menuPersonajeUl">
                            <li id="liCharacter"><a id="aCharacter" style="color: white; border-bottom: none;" href="#aCharacter">Personajes</a></li>
                            <li id="liChangePass"><a id="aChangePass" style="color: white; border-bottom: none;" href="#aCharacter">Cambiar contraseña</a></li>
                        </ul>
                    </div>

                    <div id="msjError" style="display: none;">
                        <div class="alert alert-danger col-sm-12 col-md-6 col-lg-4 col-xl-4">
                            <strong class="msjErrorContent"></strong>
                        </div>
                    </div>

                    <input type="hidden" name="username" value="{{ Auth::user()->username}}">
                    <div class="pjContainer">
                    </div>

                    <div class="menuAñadirPuntos" style="display: none;">
                        <form method="put" id="formPoints">
                            <div class="puntosContainer">
                                <div class="avaiblePoints">
                                    <p id="puntos"></p>
                                </div>
                                <div class="addPointsContainer">
                                    <p id="str"></p> <input type="number" name="fuerza">
                                </div>
                                <div class="addPointsContainer">
                                    <p id="agi"></p> <input type="number" name="agilidad">
                                </div>
                                <div class="addPointsContainer">
                                    <p id="sta"></p> <input type="number" name="stamina">
                                </div>
                                <div class="addPointsContainer">
                                    <p id="enr"></p> <input type="number" name="energia">
                                </div>
                                <div class="addPointsButton">
                                    <button type="submit">Agregar puntos</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="confirmarPass" style="display: none;">
                        <form method="put" class="formPass">
                            <div class="infoContainer">
                                <div class="labelLogin">
                                    <label for="pass">Contraseña</label>
                                </div>
                                <div class="inputLogin">
                                    <input type="password" name="pass" id="pass">
                                </div>
                            </div>

                            <div class="infoContainer">
                                <div class="labelLogin">
                                    <label for="re-pass">Confirmación</label>
                                </div>
                                <div class="inputLogin">
                                    <input type="password" name="re-pass" id="re-pass">
                                </div>
                            </div>

                            <div class="buttonLogin">
                                <button type="submit">Cambiar contraseña</button>
                            </div>
                        </form>
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
    <script type="text/javascript" src="{{ asset('js/panel.js') }}"></script>
</body>
</html>