<article class="LoginContainer" id="registerContainer">
    <div class="loginContent">
        <div class="noticiaTitulo">
            <h4>Registrate</h4>
        </div>
        <div class="formContainer" id="formRegisterContainer">
            <form method="post" id="formRegister">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="infoContainer">
                    <div class="labelLogin">
                        <label for="account">Usuario</label>
                    </div>

                    <div class="inputLogin">
                        <input type="text" name="account" id="account">
                    </div>

                    <span class="js-block text-danger" style="display: none;" id="accountError">
                        <strong class="accountError"></strong>
                    </span>
                    @if ($errors->has('account'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('account') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="infoContainer">
                    <div class="labelLogin">
                        <label for="email">Email</label>
                    </div>

                    <div class="inputLogin">
                        <input type="text" name="email" id="email">
                    </div>

                    <span class="help-block text-danger" style="display: none;" id="emailError">
                        <strong class="emailError"></strong>
                    </span>
                    @if ($errors->has('email'))
                        <span class="help-block text-danger">
                            <strong class="emailError">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="infoContainer">
                    <div class="labelLogin">
                        <label for="pass">Contraseña</label>
                    </div>

                    <div class="inputLogin">
                        <input type="password" name="pass" id="pass">
                    </div>

                    <span class="help-block text-danger" style="display: none:" id="passError">
                        <strong class="passError"></strong>
                    </span>
                    @if ($errors->has('pass'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('pass') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="infoContainer">
                    <div class="labelLogin">
                        <label for="password_confirmation">Confirmar contraseña</label>
                    </div>

                    <div class="inputLogin">
                        <input type="password" name="password_confirmation" id="password_confirmation">
                    </div>
                </div>

                <div class="infoContainer" id="selectContainer">
                    <div class="labelLogin">
                        <label for="country">Seleccion tu pais</label>
                    </div>

                    <div class="infoLogin">
                        <select name="country" id="country">
                            <option value="default">Selecciona un pais</option>
                        </select>
                    </div>

                    <span class="help-block text-danger" style="display: none;" id="countryError">
                        <strong class="countryError"></strong>
                    </span>
                    @if ($errors->has('country'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="infoContainer" id="selectContainer">
                    <div class="labelLogin">
                        <label for="secretQuestion">Pregunta secreta</label>
                    </div>

                    <div class="infoLogin">
                        <select name="secretQuestion" id="secretQuestion">
                            <option value="default">Selecciona una pregunta</option>
                            <option value="1">Nombre de tu primera mascota?</option>
                            <option value="2">Nombre de tu madre ?</option>
                            <option value="3">Nombre de tu padre?</option>
                            <option value="4">Nombre de tu colegio?</option>
                            <option value="5">Comida favorita?</option>
                            <option value="6">Banda favorita?</option>
                            <option value="7">Animal favorito?</option>
                            <option value="8">Color favorito?</option>
                            <option value="9">Serie favorita?</option>
                        </select>

                        
                        <span class="help-block text-danger" style="display: none;" id="secretQuestionError">
                            <strong class="secretQuestionError"></strong>
                        </span>
                        
                        @if ($errors->has('secretQuestion'))
                            <span class="help-block text-danger">
                                <strong >{{ $errors->first('secretQuestion') }}</strong>
                            </span>
                        @endif
                        
                        <div class="inputLogin">
                            <input type="text" name="answerSecret" id="answerSecret" placeholder="Respuesta secreta">
                        </div>

                        <span class="help-block text-danger" style="display: none;" id="answerSecretError">
                            <strong class="answerScret"></strong>
                        </span>
                        @if ($errors->has('answerSecret'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('answerSecret') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="buttonLogin">
                    <button type="submit">Registrarse</button>
                </div>

                </div>
            </form>
        </div>
    </div>
</article>