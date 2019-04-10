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
    <title>Hasket Mu - Ranking</title>
</head>
<body>
    @include('partials.header')
    <section class="container-fluid">
        @include('modules.server_info')
        <section class="contentContainer">
            <div class="separator">
                <article class="rankingContainer" id="rankingIdWeb">
                    <div class="noticiaTitulo">
                        <h4>Rankings</h4>
                    </div>
                    <div class="rankingButtons">
                        <a href="#rankingIdWeb" class="rankingButtonsA" id="guildButton">Guilds</a>
                        <a href="#rankingIdWeb" class="rankingButtonsA" id="resetButton">Reset</a>
                        <a href="#rankingIdWeb" class="rankingButtonsA" id ="genButton">Gens</a>
                    </div>

                    <div class="rankingTable">
                        <div class="guildContainer" style="display: none;">

                            <div class="guildRow">
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
    <script type="text/javascript">
        function menuIterative() {
            let guild = document.querySelector('#guildButton');
            let reset = document.querySelector('#resetButton');
            let gen = document.querySelector('#genButton');

            guild.addEventListener('click', guildButtonEvent);
            reset.addEventListener('click', resetButtonEvent);
            gen.addEventListener('click', genButtonEvent);
        }

        function guildButtonEvent() {
            let guild = document.querySelector('#guildButton');
            let titulo = ['Guild', 'Guild Master', 'Score'];
            displayRanking('guild', titulo);
            guild.removeEventListener('click', guildButtonEvent);
        }

        function resetButtonEvent() {
            let titulo = ['Nombre', 'Raza', 'Reset'];
            let reset = document.querySelector('#resetButton');
            displayRanking('reset', titulo);
            reset.removeEventListener('click', resetButtonEvent);
        }

        function genButtonEvent() {
            let titulo = ['Nombre', 'Raza', 'Reset'];
            let gen = document.querySelector('#genButton');
            displayRanking('gen', titulo);
            gen.removeEventListener('click', genButtonEvent);
        }

        async function displayRanking(ranking, titulo) {
            let container = document.querySelector('.guildContainer');
            container.style.display = 'flex';
            if(ranking == 'guild') {
                let json = await bringRankingGuild();
                let message = json.message;
                container.innerHTML = 
                `
                    <div id="guildTittleRanking">
                        <p>${titulo[0]}</p> <p>${titulo[1]}</p> <p>${titulo[2]}</p>
                    </div>
                `;
                if(Object.keys(json.message).length == 0 ) {
                    container.innerHTML = '';
                    container.innerHTML += '<p>No hay guilds creados todavia</p>';
                } else {
                    for (const i in message) {
                        if (message.hasOwnProperty(i)) {
                            const element = message[i];
                            container.innerHTML += 
                            `
                                    <div class="guildRow">
                                        <p>${element.G_Name}</p> <p>${element.G_Master}</p> <p>${element.G_Score}</p>
                                    </div>
                            `;
                            
                        }
                    }
                }
            } else if (ranking == 'reset') {
                let json = await bringRankingCharacter();
                let message = json.message;
                container.innerHTML = '';
                container.innerHTML = 
                `
                    <div id="guildTittleRanking">
                    <p>${titulo[0]}</p> <p>${titulo[1]}</p> <p>${titulo[2]}</p>
                    </div>
                `;
                for (const i in message) {
                    if (message.hasOwnProperty(i)) {
                        const element = message[i];
                        console.log(element.Class);
                        let clase = classCharacter(parseInt(element.Class));
                        container.innerHTML += 
                            `
                                <div class="guildRow">
                                    <p>${element.Name}</p> <p>${clase}</p> <p>${element.RESETS}</p>
                                </div>
                            `;
                    }
                }
            } else if (ranking == 'gen') {
                let json = await bringRankingGen();
                let message = json.message;
                container.innerHTML = '';
                container.innerHTML = 
                `
                    <div id="guildTittleRanking">
                    <p>${titulo[0]}</p> <p>${titulo[1]}</p> <p>${titulo[2]}</p>
                    </div>
                `;
                for (const i in message) {
                    if (message.hasOwnProperty(i)) {
                        const element = message[i];
                        container.innerHTML += 
                        `
                            <div class="guildRow">
                                <p>${element.Name}</p> <p>${element.Class}</p> <p>${element.Points}</p>
                            </div>                        
                        `;
                    }
                }
            }
        }

        async function bringRankingGuild() {
            let response = await fetch('/api/guildRanking');
            let json = response.json();
            return json;
        }

        async function bringRankingCharacter() {
            let response = await fetch('/api/resetRanking');
            let json = response.json();
            return json;
        }

        async function bringRankingGen() {
            let response = await fetch('/api/genRanking');
            let json = response.json();
            return json;
        }

        function classCharacter(numb) {
            let answer = '';
            switch (numb) {
                case 0:
                    answer = 'Dark Wizard';
                    break;

                case 1:
                    answer = 'Soul Master';
                    break;

                case 2:
                    answer = 'Grand Master';
                    break;

                case 16:
                    answer = 'Dark Knight';
                    break;

                case 17:
                    answer = 'Blade Knight';
                    break;

                case 18:
                    answer = 'Blade Master';
                    break;

                case 32:
                    answer = 'Elf';
                    break;

                case 33:
                    answer = 'Muse Elf';
                    break;

                case 34:
                    answer = 'High Elf';
                    break;

                case 48:
                    answer = 'Magic Gladiator';
                    break;

                case 49:
                    answer = 'Duel Master';
                    break;

                case 50:
                    answer = 'Duel Master';
                    break;

                case 64:
                    answer = 'Dark Lord';
                    break;

                case 66:
                    answer = 'Dark Lord';
                    break;

                case 65:
                    answer = 'Lord Emperor';
                    break;

                case 80:
                    answer = 'Summoner';
                    break;

                case 81:
                    answer = 'Bloody Summoner';
                    break;

                case 82:
                    answer = 'Dimension Master';
                    break;

                case 96:
                    answer = 'Rage Fighter';
                    break;

                case 97:
                    answer = 'Rage Fighter';
                    break;

                case 98:
                    answer = 'First Master';
                    break;

                case 122:
                    answer = 'Grow Lancer';
                    break;

                case 112:
                    answer = 'Blade Master';
                    break;

                case 114:
                    answer = 'Mirage Lancer';
                    break;
            
                default:
                    answer = 'Undefined';
                    break;
            }
            return answer;
        }

        menuIterative();
    </script>
</body>
</html>