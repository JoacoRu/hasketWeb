<header class="headerMobile">
    <div class="headerMobileDivUno">
        <div class="dropdown">
            <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="logoMenuBurguer"><h3>HASKET MU</h3></div>
                <a class="dropdown-item" href="/downloads">DESCARGAS</a>
                <a class="dropdown-item" href="/ranking">RANKING</a>
                <a class="dropdown-item" href="/panel">PANEL DE USUARIO</a>
                <a class="dropdown-item cuentasMenuHeaderMobile" href="/login">ENTRAR</a>
                <a class="dropdown-item cuentasMenuHeaderMobile" href="/register">CREAR CUENTA</a>
            </div>
          </div>
    </div>

    <div class="headerMobileDivDos">
        <div class="logoHeaderMobile">
            <img src="{{ asset('images/logo.png') }}" alt="logo">
        </div>
    </div>

    <div class="headerMobileDivTres">
    </div>
</header>


<header class="headerNormal">
    <div class="headerNormalDivUno">
        <img src="{{ asset('images/logo.png') }}" alt="logo">
    </div>
    <div class="headerNormalDivDos">
        <ul class="headerNormalUl">
            <div class="divHeaderNormalLi">
                <li class="headerNormalLi"><a href="/downloads" style="color: white;">DESCARGAS</a></li>
            </div>

            <div class="divHeaderNormalLi">
                <li class="headerNormalLi"><a href="/ranking" style="color: white;">RANKING</a></li>
            </div>
            @if(Auth::check() == 1)
            <div class="divHeaderNormalLi">
                <li class="headerNormalLi"><a href="/panel" style="color: white;">MI CUENTA</a></li>
            </div>
            @endif


            @if(Auth::check() != 1)
                <div class="divHeaderNormalLi">
                    <li class="headerNormalLi"><a href="/login" style="color: white;">ENTRAR</a></li>
                </div>
            @else
                <div class="divHeaderNormalLi">
                    <li class="headerNormalLi"><a href="/#" style="color: white;">DONACIONES</a></li>
                </div>
            @endif

            @if(Auth::check() != 1)
                <div class="divHeaderNormalLi">
                    <li class="headerNormalLi"><a href="/register" style="color: white;">CREAR CUENTA</a></li>
                </div>
            @else
                <div class="divHeaderNormalLi">
                    <li class="headerNormalLi"><a href="logout" style="color: white;">SALIR</a></li>
                </div>
            @endif
        </ul>
        
    </div>

    <div class="headerNormalDivTres">

    </div>
</header>