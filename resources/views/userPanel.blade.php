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
                if(Object.keys(obj).length != 1) {
                    if(obj.zen) {
                        errorContent.innerHTML += `${obj.zen} </br> </br>`;
                    }
                    
                    if(obj.level) {
                        errorContent.innerHTML += `${obj.zen} </br> </br>`;
                    }

                    if(obj.points) {
                        errorContent.innerHTML += `${obj.points} </br> </br>`;
                    }

                    if(obj.str) {
                        errorContent.innerHTML += `${obj.str} </br> </br>`;
                        console.log(obj.str);
                    }

                    if(obj.agi) {
                        errorContent.innerHTML += `${obj.agi} </br> </br>`;
                    }

                    if(obj.sta) {
                        errorContent.innerHTML += `${obj.sta} </br> </br>`;
                    }

                    if(obj.enr) {
                        errorContent.innerHTML += `${obj.enr} </br> </br>`;
                    }
                } else {
                    if(obj.zen) {
                        errorContent.innerHTML = `${obj.zen}`;
                    }
                    
                    if(obj.level) {
                        errorContent.innerHTML = `${obj.zen}`;
                    }

                    if(obj.number) {
                        errorContent.innerHTML = `${obj.number}`;
                    }

                    if(obj.points) {
                        errorContent.innerHTML = `${obj.points}`;
                    }

                    if(obj.str) {
                        errorContent.innerHTML += `${obj.str}`;
                    }

                    if(obj.agi) {
                        errorContent.innerHTML += `${obj.agi}`;
                    }

                    if(obj.sta) {
                        errorContent.innerHTML += `${obj.sta}`;
                    }

                    if(obj.enr) {
                        errorContent.innerHTML += `${obj.enr}`;
                    }
                }
            }
        }

        function addPoints(points, strength, dexterity, vitality, energy) {
            let pjContainer = document.querySelector('.pjContainer');
            let addPoints = document.querySelector('.menuAñadirPuntos');
            let puntos = document.querySelector('#puntos');
            let str = document.querySelector('#str');
            let agi = document.querySelector('#agi');
            let sta = document.querySelector('#sta');
            let enr = document.querySelector('#enr');
            pjContainer.style.display = 'none';
            addPoints.style.display = 'flex';
            puntos.innerHTML = `Puntos disponibles: ${points}`;
            str.innerHTML = `Fuerza: ${strength}`;
            agi.innerHTML = `Agilidad: ${dexterity}`;
            sta.innerHTML = `Stamina: ${vitality}`;
            enr.innerHTML = `Energia: ${energy}`;
            sendPoints(points, strength, dexterity, vitality, energy);
        }

        function sendPoints(points, strength, dexterity, vitality, energy) {
            let form = document.querySelector('#formPoints');
            form.addEventListener('submit', function(e){
                let str = this.fuerza;
                let agi = this.agilidad;
                let sta = this.stamina;
                let enr = this.energia;
                let obj = {};
                let sumStr = 0;
                let sumAgi = 0;
                let sumSta = 0;
                let sumEnr = 0;  
                                  
                if(parseInt(str.value) != 0) {
                    sumStr = parseInt(str.value);
                }

                if(parseInt(agi.value) != 0) {
                    sumAgi = parseInt(agi.value);
                }

                if(parseInt(sta.value) != 0) {
                    sumSta = parseInt(sta.value);
                }

                if(parseInt(enr.value) != 0) {
                    sumEnr = parseInt(enr.value);
                }
                
                let totalPoints = sumStr + sumAgi + sumSta + sumEnr;
                    
                if(totalPoints > points) {
                    obj.points = `Has excedido la cantidad de puntos disponibles ${points}`;
                }

                if(parseInt(str.value) + strength > 65535) {
                    obj.str = `Has alcanzado el limite de puntos de fuerza`;
                } else {
                    delete obj.str;
                }

                if(parseInt(agi.value) + dexterity > 65535) {
                    obj.agi = `Has alcanzado el limite de puntos de agilidad`;
                    console.log(typeof agi.value);
                }  else {
                    delete obj.agi;
                }

                if(parseInt(sta.value) + vitality > 65535) {
                    obj.sta = "Has alcanzado el limite de puntos de agilidad";
                } else {
                    delete obj.sta;
                }

                if (parseInt(enr.value) + energy > 65535) {
                    obj.enr = "Has alcanzado el limite de puntos de energia";
                } else {
                    delete obj.enr;
                }

                if(Object.keys(obj).length != 0) {
                    showMessages(obj);
                    e.preventDefault();
                } else {
                    console.log('agrego puntos');
                    e.preventDefault();
                }
            });
        }
    
    </script>
</body>
</html>