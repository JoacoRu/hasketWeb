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
    <title>Hasket Mu - Recuperar contraseña</title>
</head>
<body>
    @include('partials.header')
    <section class="container-fluid">
        @include('modules.server_info')
        <section class="contentContainer">
            <div class="separator">
                <article class="LoginContainer" id="registerContainer">
                    <div class="confirmarPass">
                            @if(count($errors) == 0)
                                <div id="msjError" style="display: none;">
                                    <div class="alert alert-danger col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <strong class="msjErrorContent">
                                        </strong>
                                    </div>
                                </div>
                            @else
                                <div id="msjError">
                                    <div class="alert alert-danger col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <strong class="msjErrorContent">
                                            @foreach($errors as $msg)
                                                {{$msg}}
                                            @endforeach
                                        </strong>
                                    </div>
                                </div>
                            @endif
                            <form method="post" class="formPass">
                                <div class="infoContainer">
                                    <div class="labelLogin">
                                        <label for="account">Usuario</label>
                                    </div>

                                    <div class="inputLogin">
                                        <input type="text" name="username" id="username">
                                    </div>
                                </div>
                                
                                <div class="infoContainer" id="selectContainer">
                                    <div class="labelLogin">
                                        <label for="secretQuestion">Pregunta secreta</label>
                                    </div>

                                    <div class="infoLogin">
                                        <select name="secretQuestion" id="secretQuestion">
                                            <option value="default">Selecciona una pregunta</option>
                                            <option value="1">Nombre de tu primera mascota?</option>
                                            <option value="2">Nombre de tu madre ?</option>
                                            <option value="3">Nombre de tu padre?</option>
                                            <option value="4">Nombre de tu colegio?</option>
                                            <option value="5">Comida favorita?</option>
                                            <option value="6">Banda favorita?</option>
                                            <option value="7">Animal favorito?</option>
                                            <option value="8">Color favorito?</option>
                                            <option value="9">Serie favorita?</option>
                                        </select>
                                        
                                        <div class="inputLogin">
                                            <input type="text" name="answerSecret" id="answerSecret" placeholder="Respuesta secreta">
                                        </div>
                                    </div>
                                </div>

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
                                        <input type="password" name="rePass" id="re-pass">
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
    <script src="{{ asset('js/home.js') }}"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2"></script>
</body>
</html>