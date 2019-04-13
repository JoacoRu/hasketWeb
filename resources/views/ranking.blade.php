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
                        <table class="rwd-table" style="display: hidden;">
                            <tr class="tittleRanking">
                            </tr>
                            <tr class="contentRanking">
                                
                            </tr>
                        </table>
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
            let container = document.querySelector('.rwd-table');
            let title = document.querySelector('.tittleRanking');
            let content = document.querySelector('.contentRanking');
            container.style.display = 'initial !important';
            console.log(container.style);
            if(ranking == 'guild') {
                container.innerHTML = ' ';
                content.innerHTML = ' ';
                let json = await bringRankingGuild();
                let message = json.message;
                container.innerHTML = 
                `
                    <tr class="tittleRanking">
                        <th>${titulo[0]}</th>
                        <th>${titulo[1]}</th>
                        <th>${titulo[2]}</th>
                    </tr>                
                `;
                if(Object.keys(json.message).length == 0 ) {
                    container.innerHTML = '';
                    container.innerHTML += '<p style="font-weigth: bold;">No hay guilds  con socore todavia</p>';
                } else {
                    for (const i in message) {
                        if (message.hasOwnProperty(i)) {
                            const element = message[i];
                            container.innerHTML += 
                            `
                                <tr class="contentRanking">
                                    <td data-th="${titulo[0]}">${element.G_Name}</td>
                                    <td data-th="${titulo[1]}">${element.G_Master}</td>
                                    <td data-th="${titulo[2]}">${element.G_Score}</td>
                                </tr>
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
                    <tr class="tittleRanking">
                        <th>${titulo[0]}</th>
                        <th>${titulo[1]}</th>
                        <th>${titulo[2]}</th>
                    </tr>  
                `;
                for (const i in message) {
                    if (message.hasOwnProperty(i)) {
                        const element = message[i];
                        let clase = classCharacter(parseInt(element.Class));
                        container.innerHTML += 
                            `
                                <tr class="contentRanking">
                                    <td data-th="${titulo[0]}">${element.Name}</td>
                                    <td data-th="${titulo[1]}">${clase}</td>
                                    <td data-th="${titulo[2]}">${element.RESETS}</td>
                                </tr>
                            `;
                    }
                }
            } else if (ranking == 'gen') {
                let json = await bringRankingGen();
                let message = json.message;
                title.innerHTML = '';
                content.innerHTML = '';
                title.innerHTML = 
                    `
                        <tr class="tittleRanking">
                            <th>${titulo[0]}</th>
                            <th>${titulo[1]}</th>
                            <th>${titulo[2]}</th>
                        </tr>  
                    `;
                for (const i in message) {
                    if (message.hasOwnProperty(i)) {
                        const element = message[i];
                        container.innerHTML += 
                            `

                                <tr class="contentRanking">
                                    <td data-th="${titulo[0]}">${element.Name}</td>
                                    <td data-th="${titulo[1]}">${element.Class}</td>
                                    <td data-th="${titulo[2]}">${element.Points}</td>
                                </tr>                     
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
    <style>
        @import "https://fonts.googleapis.com/css?family=Montserrat:300,400,700";
        .rwd-table {
            margin: 1em 0;
            min-width: 300px;
        }
        .rwd-table th {
            display: none;
        }
        .rwd-table td {
            display: block;
        }
        .rwd-table td:first-child {
            padding-top: .5em;
        }
        .rwd-table td:last-child {
            padding-bottom: .5em;
        }
        .rwd-table td:before {
            content: attr(data-th) ": ";
            font-weight: bold;
            width: 6.5em;
            display: inline-block;
        }

        @media (min-width: 480px) {
            .rwd-table td:before {
                display: none;
            }

            .rwd-table th, .rwd-table td {
            text-align: left;
            }

            .rwd-table th, .rwd-table td {
                display: table-cell;
                padding: .25em .5em;
            }

            .rwd-table th:first-child, .rwd-table td:first-child {
                padding-left: 0;
            }

            .rwd-table th:last-child, .rwd-table td:last-child {
                padding-right: 0;
            }

            .rwd-table th, .rwd-table td {
                padding: 1em !important;
            }
        }

        h1 {
            font-weight: normal;
            letter-spacing: -1px;
            color: #34495E;
        }

        .rwd-table {
            color: #fff;
            border-radius: .4em;
            overflow: hidden;
        }
        .rwd-table tr {
        }
        .rwd-table th, .rwd-table td {
            margin: .5em 1em;
        }
        
        .rwd-table th, .rwd-table td:before {
            color: #dd5;
        }

        .tittleRanking {
            background-color: #cc0000;
            margin-bottom: 2px;
        }

        .tittleRanking th {
            color: white;
            text-align: center;
            border: none !important;
        }

        .contentRanking {
            background-color: #333 !important;
        }

        .contentRanking td {
            color: #ECEBF3;
            text-align: center;
            font-weight: bold;
        }

    </style>
</body>
</html>