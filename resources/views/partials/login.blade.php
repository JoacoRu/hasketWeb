<article class="LoginContainer">
    <div class="loginContent">
        <div class="noticiaTitulo">
            <h4>Ingresa</h4>
        </div>
        <div class="formContainer">
            <form method="post">
                <div class="infoContainer">
                    <div class="labelLogin">
                        <label for="account">Usuario</label>
                    </div>

                    <div class="inputLogin">
                        <input type="text" name="username" id="username">
                    </div>

                    @if ($errors->has('username'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                    <div class="infoContainer">
                        <div class="labelLogin">
                            <label for="pass">Contraseña</label> <span><a href="#">olvidaste?</a></span>
                        </div>

                        <div class="inputLogin">
                            <input type="password" name="password" id="pass">
                        </div>

                        @if ($errors->has('password'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
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