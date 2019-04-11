<article class="LoginContainer">
    <div class="loginContent">
        <div class="noticiaTitulo" id="loginIdWeb">
            <h4>Ingresa</h4>
        </div>
        <div class="formContainer">
            <form method="post">
                <div class="infoContainer">
                    <div class="labelLogin">
                        <label for="account">Usuario</label>
                    </div>

                    <div class="inputLogin">
                        <input type="text" name="username" id="username" value="{{ old('username') }}">
                    </div>
                </div>

                    <div class="infoContainer">
                        <div class="labelLogin">
                            <label for="pass">Contraseña</label> <span><a href="/recuperar">olvidaste?</a></span>
                        </div>

                        <div class="inputLogin">
                            <input type="password" name="password" id="pass">
                        </div>

                        @if (count($errors) != 0)
                            @foreach($errors as $value)
                                <span class="help-block text-danger">
                                    <strong>{{ $value }}</strong>
                                </span>
                            @endforeach
                        @endif
                    </div>

                    <div class="buttonLogin">
                        <button type="submit">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</article>