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
                <article class="rankingContainer">
                    <div class="rankingButtons">
                        <a href="#" class="rankingButtonsA">Guilds</a>
                        <a href="#" class="rankingButtonsA">Reset</a>
                        <a href="#" class="rankingButtonsA">Gens</a>
                    </div>

                    <div class="rankingTable" style="display: none;">
                        <div class="guildContainer">
                            <div id="guildTittleRanking">
                                <p>Guild</p> <p>Guild Master</p> <p>Score</p>
                            </div>

                            <div class="guildRow">
                                <p>CoscuArmy</p> <p>Betun</p> <p>1500</p>
                            </div>
                        </div>
                    </div>

                    <div class="rankingTable" style="display: none;">
                        <div class="guildContainer">
                            <div id="guildTittleRanking">
                                <p>Nombre</p> <p>Raza</p> <p>Reset</p>
                            </div>

                            <div class="guildRow">
                                <p>Betun</p> <p>Dark Wizard</p> <p>10</p>
                            </div>
                        </div>
                    </div>

                    <div class="rankingTable" style="display: none;">
                        <div class="guildContainer">
                            <div id="guildTittleRanking">
                                <p>Nombre</p> <p>Gen</p> <p>Puntos</p>
                            </div>

                            <div class="guildRow">
                                <p>Betun</p> <p>D</p> <p>10</p>
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