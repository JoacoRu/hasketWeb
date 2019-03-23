window.onload = function () {
    function registerInsertAndValidate() {
        let formRegister = document.querySelector('#formRegister');
        let username = document.querySelector('input[name="account"]');
        let email = document.querySelector('input[name="email"]');
        let pass = document.querySelector('input[name="pass"]');
        let repass = document.querySelector('input[name="password_confirmation"]');
        let country = document.querySelector('select[name="country"]');
        let secretQuestion = document.querySelector('select[name="secretQuestion"]');
        let secretAnswer = document.querySelector('input[name="answerSecret"]');
        var errors = {};
        
        formRegister.addEventListener('submit', function(e) {
            if(isAEmptyString(username.value)) {
                errors.username = 'El campo es obligatorio';
                showMessagesError(errors);            
                e.preventDefault();
            } else if (username.length > 255) {
                errors.username = 'El nombre de usuario excede el limite de caracteres permitido';
                showMessagesError(errors);
                e.preventDefault();
            } else if (typeof username.value != "string") {
                errors.username = 'El nombre de usuario debe ser una cadena de texto';
                showMessagesError(errors);
                e.preventDefault();
            } else {
                delete errors;
            }

            if(email.value == '') {
                errors.email = 'El campo es obligatorio';
                showMessagesError(errors);
                e.preventDefault();
            } else if(isValidEmail(email.value) == false) {
                errors.email = 'Por favor ingresa un email con formato valido';
                showMessagesError(errors);
                e.preventDefault();
            } else {
                delete errors.email;
            }

            if(isAEmptyString(pass.value) || isAEmptyString(repass.value) ) {
                errors.pass = 'El campo es obligatorio';
                showMessagesError(errors);
                e.preventDefault();
            } else if(pass.length < 6) {
                errors.pass = 'La contraseña es demasiado corta';
                showMessagesError(errors);
                e.preventDefault();
            } else if (pass.value !== repass.value) {
                errors.pass = 'Las contraseñas  no coinciden';
                showMessagesError(errors);
                e.preventDefault();
            } else {
                delete errors.pass;
            }

            if(country.value == 'default') {
                errors.country = 'Por favor elije un pais';
                showMessagesError(errors);
                e.preventDefault();
            }

            if(secretQuestion.value == 'default') {
                errors.question = 'Por Favor elije una pregunta secreta';
                showMessagesError(errors);
                e.preventDefault();
            } else {
                delete errors.question;
            }

            if(isAEmptyString(secretAnswer.value)) {
                errors.secretAnswer = 'El campo es obligatorio';
                showMessagesError(errors);
                e.preventDefault();
            } else {
               delete errors.secretAnswer;
            }
            console.log(errors);
        });
    }

    function showMessagesError(errors) {
        let errorAccount = document.querySelector('.accountError');
        let errorEmail = document.querySelector('.emailError');
        let errorCountry = document.querySelector('.countryError');
        let errorSecretQuestion = document.querySelector('.secretQuestionError');
        let errorSecretAnswer = document.querySelector('.answerScret');
        let errorPass = document.querySelector('.passError');
        let blockAccount = document.querySelector('#accountError');
        let blockEmail = document.querySelector('#emailError');
        let blockCountry = document.querySelector('#countryError');
        let blockQuestion = document.querySelector('#secretQuestionError');
        let blockAnswer = document.querySelector('#answerSecretError');
        let blockPass = document.querySelector('#passError');

        if(errors.length != 0) {

            if(errors.username) {
                blockAccount.style.display = 'block';
                errorAccount.innerHTML = errors.username;
            } else {
                blockAccount.style.display = 'none';
                errorAccount.innerHTML = '';
            }
    
            if(errors.email) {
                blockEmail.style.display = 'block';
                errorEmail.innerHTML = errors.email;
            } else {
                blockEmail.style.display = 'none';
                errorEmail.innerHTML = 'none';
            }
    
            if(errors.pass) {
                blockPass.style.display = 'block';
                errorPass.innerHTML = errors.pass;
            } else {
                blockPass.style.display = 'none';
                errorPass.innerHTML = '';
            }
    
            if(errors.country) {
                blockCountry.style.display = 'block';
                errorCountry.innerHTML = errors.country;
            } else {
                blockCountry.style.display = 'none';
                errorCountry.innerHTML = '';
            }
    
            if(errors.question) {
                blockQuestion.style.display = 'block';
                errorSecretQuestion.innerHTML = errors.question;
            } else if (errors.question == "") {
                blockQuestion.style.display = 'none';
                errorSecretQuestion.innerHTML = '';
            }
    
            if(errors.secretAnswer) {
                blockAnswer.style.display = 'block';
                errorSecretAnswer.innerHTML = errors.secretAnswer;
            } else if (errors.secretAnswer == ""){
                blockAnswer.style.display = 'none';
                errorSecretAnswer.innerHTML = '';
            }
        }
    }

    function isAEmptyString(string) {
        let answer;

        if(string == '') {
            answer = true;
        } else {
            answer = false;
        }

        return answer;
    }

    function isValidEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test((email).toLowerCase());
    }

    function bringAndInserCountries() {
        let countrySelect = document.querySelector('#country');
        fetch('/api/countries')
        .then(function(response) {
            return response.json();
        })
        .then(function(countries) {
            for (const i in countries) {
                if (countries.hasOwnProperty(i)) {
                    const element = countries[i];
                    const html = `<option value="${element.id}">${element.country_name}</option>`;
                    countrySelect.innerHTML += html;
                }
            }
        });
    }

    registerInsertAndValidate();
    bringAndInserCountries();
}