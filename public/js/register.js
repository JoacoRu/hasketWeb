window.onload = function () {
    let username = document.querySelector('input[name="username"]');
    let email = document.querySelector('input[name="email"]');
    username.value = 'user';
    email.value = 'email';   

    function registerInsertAndValidate() {
        let formRegister = document.querySelector('#formRegister');
        let username = document.querySelector('input[name="username"]');
        let email = document.querySelector('input[name="email"]');
        let pass = document.querySelector('input[name="pass"]');
        let repass = document.querySelector('input[name="password_confirmation"]');
        let country = document.querySelector('select[name="country"]');
        let secretQuestion = document.querySelector('select[name="secretQuestion"]');
        let secretAnswer = document.querySelector('input[name="answerSecret"]');
        var errors = {};
    
        formRegister.addEventListener('submit', function(e) {
            let usernameLocal = window.localStorage.getItem('username');
            let emailLocal = window.localStorage.getItem('email');
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
            } else if (usernameLocal == username.value) {
                errors.username = `El nombre ${username.value}, ya esta en uso`;
                showMessagesError(errors);
                e.preventDefault();
            } else {
                delete errors.username;
            }

            if(email.value == '') {
                errors.email = 'El campo es obligatorio';
                showMessagesError(errors);
                e.preventDefault();
            } else if(isValidEmail(email.value) == false) {
                errors.email = 'Por favor ingresa un email con formato valido';
                showMessagesError(errors);
                e.preventDefault();
            } else if (emailLocal == email.value){
                errors.email = `El email ${email.value}, ya esta en uso`;
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
            } else {
                delete errors.country;
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

            if(Object.keys(errors).length == 0) {
                console.log('no envie datos'); 
                e.preventDefault();
                sendDataToMsql(username.value, pass.value, email.value, country.value, secretQuestion.value, secretAnswer.value);
                setInterval(function(){
                    console.log('termine la espera');
                    formRegister.submit();
                }, 4000)
            }
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

    async function validUsername(user) {
        let answer;
        const response = await fetch(`/api/username/${user}`);
        const json = await response.json();

        if(json == 1) {
            answer = 1;
        } else {
            answer = 0;
        }

        return answer;
    }

    async function validEmail(email) {
        let answer;
        const response = await fetch(`/api/email/${email}`);
        const json = await response.json();
            
        if(json == 1) {
            answer = 1;
        } else {
            answer = 0;
        }

        return answer;
    }

    function formValidationForm() {
        let username = document.querySelector('input[name="username"]');
        let email = document.querySelector('input[name="email"]');
        let obj = {};
        username.addEventListener('change', function() {
            userValidation();
            username.addEventListener('change', userValidation());
        });

        async function userValidation(){
            let usernameValid = await validUsername(username.value);
            if(username.value != '') {
                if(usernameValid == 0) {
                    obj.username = `El nombre ya esta en uso`;
                    window.localStorage.setItem('username', username.value);
                    showMessagesError(obj);
                } else {
                    delete obj.username;
                    showMessagesError(obj);
                }
            }
        }

        email.addEventListener('change', function(){
            emailValidation();
            email.addEventListener('change', emailValidation())
        });

        async function emailValidation() {
            let emailValid = await validEmail(email.value);
            if(email.value != '') {
                if(emailValid == 0) {
                    obj.email = `El email ${email.value}, ya esta en uso`;
                    window.localStorage.setItem('email', email.value);
                    showMessagesError(obj);
                } else {
                    delete obj.email;
                    showMessagesError(obj);
                }
            }
        }
    }

    function sendDataToMsql(account, password, email, country, secretQuestion, secretAnswer) {
        let blockAccount = document.querySelector('#accountError');
        let blockEmail = document.querySelector('#emailError');
        let blockCountry = document.querySelector('#countryError');
        let blockQuestion = document.querySelector('#secretQuestionError');
        let blockAnswer = document.querySelector('#answerSecretError');
        let blockPass = document.querySelector('#passError');

        if(blockAccount.style.display == 'none' && blockEmail.style.display == 'none' && blockCountry.style.display == 'none' && blockQuestion.style.display == 'none' && blockAnswer.style.display == 'none' && blockPass.style.display == 'none') {
            fetchMssql(account, password, email, country, secretQuestion, secretAnswer);
        }
    }

    function fetchMssql(account, password, email, country, secretQuestion, secretAnswer) {
        let pass = 'hasketT%y6U/!1';
        payload = {
            "pass": pass,
            "memb___id": account,
            "memb__pwd": password,
            "memb_name": "lala",
            "sno__numb": "111111111111 ",
            "post_code": null,
            "addr_info": null,
            "addr_deta": null,
            "tel__numb": null,
            "phon_numb": null,
            "mail_addr": email,
            "fpas_ques": null,
            "fpas_answ": null,
            "job__code": null,
            "mail_chek": "1",
            "bloc_code": "0",
            "ctl1_code": "0",
            "cspoints": null,
            "VipType": null,
            "VipStart": null,
            "VipDays": null,
            "JoinDate": null,
            "confirmed": 1,
            "SecretAnswer": secretAnswer,
            "activation_id": "60a115aca9efda9b2dbe9c8d27a3ce3d",
            "Gender": 1,
            "Country": country,
            "SecretQuestion": secretQuestion,
            "Vip": 0,
            "InicioVIP": "0",
            "FinVIP": "0",
            "VipTipe": 0,
            "VipDate": "0",
            "VipINF": "0",
            "admincp": 0,
            "credits": 0,
            "credits2": 0,
            "m_Grand_Resets": 0,
            "acc_ip": null,
            "mvc_vip_date": "0",
            "acc_info_text": null,
            "msponsor_limit": 0,
            "msponsor_date": null,
            "mvc_flag": null,
            "smtp_block": 0,
            "scrable_word": null,
            "scrable_original": null,
            "scrable_wrong": 0,
            "scrable_level": 0
        }

        fetch("http://145.239.19.132:3001/users",
        {
            method: "POST",
            body: JSON.stringify(payload),
            headers: {
                'Content-type': 'application/json; charset=utf-8',
                'Access-Control-Allow-Origin': '*',
                'Content-Length': '4'
            },
        })
        .then((data) => {
            JSON.parse(data);
          })
          .catch((error) => {
            throw error;
          })
    }

    formValidationForm();
    registerInsertAndValidate();
    bringAndInserCountries();
}