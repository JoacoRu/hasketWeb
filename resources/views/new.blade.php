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
                    <div class="new">
                        <div class="newTitle">
                            <h2>TItle</h2>
                        </div>
                        <div class="newContent">
                            <textarea name="asd" id="textarea">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, sapiente repudiandae quia facilis dolore necessitatibus







                            
                            , magnam blanditiis saepe quae aut dolor? Nostrum est provident ipsum incidunt molestias deleniti, aliquam nulla.
                            </textarea>
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
    <!-- <script type="text/javascript" src="{{ asset('js/panel.js') }}"></script> -->
    <script type="text/javascript">
        window.onload = function() {
            let resete = reset();

            function bringClassNameCharacter() {
                let classPj = document.querySelectorAll('.classPj');
                classPj.forEach(element => {
                    let func = element.innerHTML;
                    element.innerHTML = eval(func);
                });
            }

            //Setea segun un numero que clase de personaje es
            function characterClass(numb) {
                let answer = '';
                switch (numb) {
                    case 0:
                        answer = 'Clase: Dark Wizard';
                        break;

                    case 1:
                        answer = 'Clase: Soul Master';
                        break;

                    case 2:
                        answer = 'Clase: Grand Master';
                        break;

                    case 16:
                        answer = 'Clase: Dark Knight';
                        break;

                    case 17:
                        answer = 'Clase: Blade Knight';
                        break;

                    case 18:
                        answer = 'Clase: Blade Master';
                        break;

                    case 32:
                        answer = 'Clase: Elf';
                        break;

                    case 33:
                        answer = 'Clase: Muse Elf';
                        break;

                    case 34:
                        answer = 'Clase: High Elf';
                        break;

                    case 48:
                        answer = 'Clase: Magic Gladiator';
                        break;

                    case 49:
                        answer = 'Clase: Duel Master';
                        break;

                    case 50:
                        answer = 'Clase: Duel Master';
                        break;

                    case 64:
                        answer = 'Clase: Dark Lord';
                        break;

                    case 66:
                        answer = 'Clase: Dark Lord';
                        break;

                    case 65:
                        answer = 'Clase: Lord Emperor';
                        break;

                    case 80:
                        answer = 'Clase: Summoner';
                        break;

                    case 81:
                        answer = 'Clase: Bloody Summoner';
                        break;

                    case 82:
                        answer = 'Clase: Dimension Master';
                        break;

                    case 96:
                        answer = 'Clase: Rage Fighter';
                        break;

                    case 97:
                        answer = 'Clase: Rage Fighter';
                        break;

                    case 98:
                        answer = 'Clase: First Master';
                        break;

                    case 122:
                        answer = 'Clase: Grow Lancer';
                        break;
                
                    default:
                        answer = 'Clase: Undefined';
                        break;
                }

                return answer;
            }

            function reset() {
                let card = document.getElementsByClassName('reset');
                for (let i = 0; i < card.length; i++) {
                    const element = card[i];
                    element.addEventListener('click', function(){
                        let cardAttributte = element.getAttribute('lala');
                        let cardFinal = cardAttributte.split(' ');
                        eval(cardFinal[0]);
                    });  
                }

            }

            async function resetear(username) {
                const response = await fetch(`/api/reset/${username}`);
                const json = await response.json();
                if(json.status == 250) {
                    succesMessage(json);
                } else if(json.status == 200) {
                    showMessages(json);
                }
            }

            function showMessages(obj) {
                let containerError = document.querySelector('#msjError');
                let errorContent = document.querySelector('.msjErrorContent');
                containerError.style.display = 'flex';
                errorContent.innerHTML = obj.message[0];
            }

            function succesMessage(obj) {
                let containerSucces = document.querySelector('#msjSucces');
                let succesContent = document.querySelector('.msjSuccesContent');
                containerSucces.style.display = 'flex';
                succesContent.innerHTML = obj.message;
                setInterval(() => {
                    location.reload();
                }, 5000);
            }

            function bringImage() {
                let image = document.querySelectorAll('img[alt="Avatar"]');
                image.forEach(element => {
                    let src = element.getAttribute('src');
                    element.setAttribute('src', characterImage(parseInt(src)));
                });
            }

            function characterImage(numb) {
                let answer = '';

                switch (numb) {
                    case 0:
                        answer = 'images/personajes/sm.png';
                        break;

                    case 1:
                        answer = 'images/personajes/sm.png';
                        break;

                    case 2:
                        answer = 'images/personajes/sm.png';
                        break;

                    case 16:
                        answer = 'images/personajes/bk.png';
                        break;

                    case 17:
                        answer = 'images/personajes/bk.png';
                        break;

                    case 18:
                        answer = 'images/personajes/bk.png';
                        break;

                    case 32:
                        answer = 'images/personajes/elf.png';
                        break;

                    case 33:
                        answer = 'images/personajes/elf.png';
                        break;

                    case 34:
                        answer = 'images/personajes/elf.png';
                        break;

                    case 48:
                        answer = 'images/personajes/mg.png';
                        break;

                    case 49:
                        answer = 'images/personajes/mg.png';
                        break;

                    case 50:
                        answer = 'images/personajes/mg.png';
                        break;

                    case 64:
                        answer = 'images/personajes/dl.png';
                        break;

                    case 66:
                        answer = 'images/personajes/dl.png';
                        break;

                    case 65:
                        answer = 'images/personajes/dl.png';
                        break;

                    case 80:
                        answer = 'images/personajes/sum.png';
                        break;

                    case 81:
                        answer = 'images/personajes/sum.png';
                        break;

                    case 82:
                        answer = 'images/personajes/sum.png';
                        break;

                    case 96:
                        answer = 'images/personajes/rf.png';
                        break;

                    case 97:
                        answer = 'images/personajes/rf.png';
                        break;

                    case 98:
                        answer = 'images/personajes/rf.png';
                        break;

                    case 122:
                        answer = 'images/personajes/grow_lancer.png';
                        break;
                }

                return answer;
            }

            async function addPoints(username) {
                let pjContainer = document.querySelector('.pjContainer');
                let puntosContainer = document.querySelector('.menuAñadirPuntos');
                let usernameInput = document.querySelector('input[name="usernamePoints"]');
                let pointsInput = document.querySelector('input[name="pointsAvaiable"]');
                let puntos = document.querySelector('#puntos');
                let fuerza = document.querySelector('#str');
                let agilidad = document.querySelector('#agi');
                let stamina = document.querySelector('#sta');
                let energia = document.querySelector('#enr');
                let payload = await bringPointsByUserName(username);
                let obj = payload.character[0];  
                pjContainer.style.display = 'none';
                puntosContainer.style.display = 'flex';
                usernameInput.value = obj.Name.toString();
                pointsInput.value = parseInt(obj.LevelUpPoint);
                puntos.innerHTML = `Puntos disponibles: ${obj.LevelUpPoint}`;
                str.innerHTML = `Fuerza: ${obj.Strength}`;
                agi.innerHTML = `Agilidad: ${obj.Dexterity}`;
                sta.innerHTML = `Stamina: ${obj.Vitality}`;
                enr.innerHTML = `Energia: ${obj.Energy}`;
                validPoints();
            }

            function validPoints() {
                
            }

            function messagesPoints(obj) {
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
                            errorContent.innerHTML = `${obj.level}`;
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

            async function bringPointsByUserName(username) {
                const response = await fetch(`/api/bringPoints/${username}`);
                const json = await response.json();
                return json;
            }

            function addPointsFunctional() {
                let addPoints = document.querySelectorAll('.addPoints');
                addPoints.forEach(element => {
                    let add = element.getAttribute('add');
                    element.addEventListener('click', function(){
                        eval(add);
                    });
                });
            }

            function puntero(username) {
                addPoints(username);
            }

            async function resetPoints(username) {
                const response = await fetch(`/api/resetPoints/${username}`);
                const json = await response.json();
                let messageContainerSuccess = document.querySelector('#msjSucces');
                let messageContentSuccess = document.querySelector('.msjSuccesContent');
                let messageContainerError = document.querySelector('#msjError');
                messageContainerSuccess.style.display = 'flex';
                messageContentSuccess.innerHTML = json.message;
                messageContainerError.style.display = 'none';
                setInterval(() => {
                    location.reload();
                }, 3000);
            }

            function resetPointPuntero(username) {
                resetPoints(username);
            }

            function resetPointOnClick() {
                let addPoints = document.querySelectorAll('.resetPoints');
                addPoints.forEach(element => {
                    let add = element.getAttribute('add');
                    element.addEventListener('click', function(){
                        eval(add);
                    });
                });
            }

            bringClassNameCharacter();
            bringImage();
            addPointsFunctional();
            resetPointOnClick();
        }
    </script>
</body>
</html>