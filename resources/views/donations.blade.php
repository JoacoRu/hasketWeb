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
    <title>Hasket Mu - Donaciones</title>
</head>
<body>
    @include('partials.header')
    <section class="container-fluid">
        @include('modules.server_info')
        <section class="contentContainer">
            <div class="separator">
                <article class="donationsContainer" id="donationsIdWeb">
                    <div class="noticiaTitulo">
                        <h4>Donaciones</h4>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="custom-alerts alert alert-success fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            {!! $message !!}
                        </div>
                        <?php Session::forget('success');?>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="custom-alerts alert alert-danger fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            {!! $message !!}
                        </div>
                        <?php Session::forget('error');?>
                    @endif
                    <div class="productsContainer">
                        <div class="card" style="width: 18rem;" id="cardDonation">
                            <div class="card-body">
                                <h5 class="card-title">WCOIN</h5>
                                <p class="card-text">Con esta moneda vas a poder comprar items en la tienda dentro del juego.</p>
                                <form action="{!! URL::route('addmoney.paypal') !!}" method="post" id="donations">
                                    <input type="hidden" name="item" value="vip">
                                    <select name="amount" id="amount">
                                        <option value="5">500 WCoins x $5 USD</option>
                                        <option value="10">1000 WCoins x $10 USD</option>
                                        <option value="15">1500 WCoins x $15 USD</option>
                                        <option value="20">2000 WCoins x $20 USD</option>
                                        <option value="30">5000 WCoins x $30 USD</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Comprar</a>
                                </form>
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
</body>
</html>