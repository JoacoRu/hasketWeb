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
                            <strong class="msjErrorContent">Mensaje Prueba</strong>
                        </div>
                    </div>

                    <input type="hidden" name="username" value="{{ Auth::user()->username}}">
                    <div class="pjContainer">
                    </div>

                    <div class="menuAñadirPuntos" style="display: none;">
                        <form method="put">
                            <div class="puntosContainer">
                                <div class="avaiblePoints">
                                    <p>Puntos disponibles: 1000</p>
                                </div>
                                <div class="addPointsContainer">
                                    <p>Fuerza</p> <input type="text" name="fuerza" value="1000">
                                </div>
                                <div class="addPointsContainer">
                                    <p>Agilidad</p> <input type="text" name="fuerza" value="1000">
                                </div>
                                <div class="addPointsContainer">
                                    <p>Stamina</p> <input type="text" name="fuerza" value="1000">
                                </div>
                                <div class="addPointsContainer">
                                    <p>Energia</p> <input type="text" name="fuerza" value="1000">
                                </div>
                                <div class="addPointsButton">
                                    <button type="submit">Agregar</button>
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
    <script src="{{ asset('js/panel.js') }}"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2"></script>
    <script type="text/javascript">
        function doAReset(username, zen, level, reset, LevelUpPoint, PkCount, PkLevel, CtlCode, FruitPoint, Married, mlNextExp, WinDuels, LoseDuels, Grand_Resets) {
            let obj = {};
            if(zen < 50000000) {
                obj.zen = `No tienes suficiente zen, necesitas ${howManyZen(zen)} para resetear `;
                showMessages(obj);
            } else {
                delete obj.zen;
            }

            if(level != 400) {
                obj.level = `Necesitas ser nivel 400 para poder resetear, tu nivel actual es ${level}`;
                showMessages(obj);
            } else {
                delete obj.level;
            }

            if(Object.keys(obj).length == 0) {
                resetear(username, zen, reset, LevelUpPoint, PkCount, PkLevel, CtlCode, FruitPoint, Married, mlNextExp, WinDuels, LoseDuels, Grand_Resets);
                console.log('reseteo');
            }
        }

        function howManyZen(zen) {
            return 50000000 - zen;
        }

        function resetear(username, zen, reset, LevelUpPoint, PkCount, PkLevel, CtlCode, FruitPoint, Married, mlNextExp, WinDuels, LoseDuels, Grand_Resets) {
            let zenFinal = zen - 50000000;
            let resetFinal = reset+1;
            let payload = {
                pass: '',
                cLevel: 1,
                Money: zenFinal,
                RESETS: resetFinal,
                MapNumber: 0,
                Experience: 0,
                LevelUpPoint: LevelUpPoint,
                PkCount,
                PkLevel,
                CtlCode,
                FruitPoint,
                Married,
                mlNextExp,
                WinDuels,
                LoseDuels,
                Grand_Resets
            };

            fetch(`http://145.239.19.132:3001/characters/${username}`,
            {
                method: "PUT",
                body: JSON.stringify(payload),
                headers: {
                    'Content-type': 'application/json; charset=utf-8',
                    'Access-Control-Allow-Origin': '*',
                    'Content-Length': '4'
                },
            })
            .then((data) => {
                JSON.parse(data);
            })
            .catch((error) => {
                throw error;
            })
        } 

        function showMessages(obj) {
            let containerError = document.querySelector('#msjError');
            let errorContent = document.querySelector('.msjErrorContent');

            if(obj) {
                containerError.style.display = 'flex';
                if(obj.zen && obj.level) {
                    errorContent.innerHTML = `${obj.zen} </br> </br> ${obj.level}`;
                } else if (obj.zen && !obj.level) {
                    errorContent.innerHTML = `${obj.zen}`;
                } else if (!obj.zen && obj.level) {
                    errorContent.innerHTML = `${obj.level}`;
                }
            }
        }
    
    </script>
</body>
</html>