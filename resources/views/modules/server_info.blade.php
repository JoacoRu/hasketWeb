<article class="serverInfo">
    <div class="serverInfoDiv">
        <h1>Hasket Mu - Season 12</h1>
        <ul class="botonesServerInfoUl">
            <li class="botonesServerInfoLi"><a href="/downloads#downloadIdWeb">Descargas</a></li>
            @if(Auth::check() != 1)
                <li class="botonesServerInfoLi"><a href="/register#registerContainer">Crear cuenta</a></li>
            @else
                <li class="botonesServerInfoLi">Votanos</li>
            @endif
            <li class="botonesServerInfoLi"><a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/Mu-Hasket-302434130427988/">Facebook</a></li>
        </ul>
    </div>
</article>