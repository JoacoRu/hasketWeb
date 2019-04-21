<div class="separator" id="separator_2">
    <aside class="moduleContainer first_module">
        <div class="modulo">
            <div class="tituloModulo">
                Información del servidor
            </div>
            <div class="tablaModulo">
                <div class="modulo_renglon">
                    <p class="modulo_parrafo">Estado</p>
                    <p class="modulo_parrafo bgcVerde">Online</p>
                </div>

                <div class="modulo_renglon">
                    <p class="modulo_parrafo">Experiencia</p>
                    <p class="modulo_parrafo">x800</p>
                </div>
                <div class="modulo_renglon">
                    <p class="modulo_parrafo">Drop</p>
                    <p class="modulo_parrafo">60%</p>
                </div>
                <div class="modulo_renglon">
                    <p class="modulo_parrafo">Version</p>
                    <p class="modulo_parrafo">S9</p>
                </div>
                <div class="modulo_renglon">
                    <p class="modulo_parrafo">Cuentas creadas</p>
                    <p class="modulo_parrafo" id="cuentasCreadas">3</p>
                </div>

                <div class="modulo_renglon">
                    <p class="modulo_parrafo">Guilds creados</p>
                    <p class="modulo_parrafo" id="guildsCreados">3</p>
                </div>
                <div class="modulo_renglon">
                    <p class="modulo_parrafo">Personajes creados</p>
                    <p class="modulo_parrafo"id="personajesCreados">9</p>
                </div>
                <div class="modulo_renglon">
                    <p class="modulo_parrafo">Conectados</p>
                    <p class="modulo_parrafo bgcVerde" id="personajesOn">0</p>
                </div>
            </div>
        </div>
    </aside>

    <aside class="moduleContainer">
        <div class="modulo">
            <div class="tituloModulo">
                Eventos
            </div>
            <div class="tablaModulo">
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">Chaos Castle</p>
                    <p class="modulo_parrafo" id="chaosCastle">0:25:47</p>
                </div>

                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">Devil Square</p>
                    <p class="modulo_parrafo" id="devilSquare">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">Blood Castle</p>
                    <p class="modulo_parrafo"id="bloodCastle">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">Chaos Castle Survival</p>
                    <p class="modulo_parrafo" id="chaosCastleSurvival">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">Illusion Temple</p>
                    <p class="modulo_parrafo" id="illusionTemple">0:25:47</p>
                </div>

                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">Acheron</p>
                    <p class="modulo_parrafo"id="acheron">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">Arca</p>
                    <p class="modulo_parrafo" id="arca">0:25:47</p>
                </div>
            </div>
        </div>
    </aside>

    <aside class="moduleContainer" id="module_guild">
        <div class="modulo">
            <div class="tituloModulo">
                Top Guild
            </div>
            <div class="tablaModulo" id="guildContainer">
            </div>
        </div>
    </aside>

    <aside class="moduleContainer" id="module_guild">
        <div class="modulo">
            <div class="tituloModulo">
                Top Reset
            </div>
            <div class="tablaModulo" id="resetContainer">
            </div>
        </div>
    </aside>
</div>

<script type="text/javascript">
    async function bringCountCharacters() {
        const response = await fetch(`/api/countCharacters`);
        const json = await response.json();
        let pjC = document.querySelector('#personajesCreados');
        pjC.innerHTML = json.message;

    }

    async function bringCountAccount() {
        const response = await fetch(`/api/countAccounts`);
        const json = await response.json();
        let account = document.querySelector('#cuentasCreadas');
        account.innerHTML = json.message;
    }

    async function bringCountGuilds() {
        const response = await fetch(`/api/countGuilds`);
        const json = await response.json();
        let guilds = document.querySelector('#guildsCreados');
        guilds.innerHTML = json.message;
    }

    async function bringUsersOn() {
        const response = await fetch(`/api/usersOn`);
        const json = await response.json();
        let pjOn = document.querySelector('#personajesOn');
        pjOn.innerHTML = json.message;
    }

    async function resetRanking() {
        const response = await fetch(`/api/resetRanking`);
        const json = await response.json();
        let resetContainer = document.querySelector('#resetContainer');
        let obj = json.message;
        for (const i in obj) {
            if (obj.hasOwnProperty(i)) {
                const element = obj[i];
                resetContainer.innerHTML += `
                    <div class="modulo_renglon modulo_eventos">
                        <p class="modulo_parrafo">${element.Name}</p>
                        <p class="modulo_parrafo">${element.RESETS}</p>
                    </div>
                `
            }
        }
    }

    async function guildRanking() {
        const response = await fetch(`/api/guildRanking`);
        const json = await response.json();
        let guildContainer = document.querySelector('#guildContainer');
        let obj = json.message;
        if(Object.keys(obj).length == 0) {
            guildContainer.innerHTML += `
                <div class="modulo_renglon modulo_eventos">
                    No hay guilds creados
                </div>
            `
        } else {
            for (const i in obj) {
                if (obj.hasOwnProperty(i)) {
                    const element = obj[i];
                    guildContainer.innerHTML += `
                        <div class="modulo_renglon modulo_eventos">
                            <p class="modulo_parrafo">${element.G_Name}</p>
                            <p class="modulo_parrafo">${element.G_Score}</p>
                        </div>
                    `
                }
            }
        }
    }

    // function getRemaingTime(dias, horas, minutos, segundos) {
    //     let now = new Date()
    //     // let remainTime = new Date(deadline);
    //     let remainSeconds = segundos - now.getSeconds();
    //     let remainMinutes = minutos - now.getMinutes();
    //     let remainHours =  horas - now.getHours();
    //     let remainDays = dias - now.getDate();
        
    //     console.log(horas);
        
    //     let obj = {
    //         remainSeconds,
    //         remainMinutes,
    //         remainHours,
    //         remainDays
    //     };
    //     return obj;
    // }

    // function dateConvert(arr, value) {
    //     let actualHour = new Date().getHours();
    //     var answ;
    //     if(value == 11) {
    //         if(actualHour < arr[1]) {
    //             answ = arr[0];
    //         } else if (actualHour < arr[2]) {
    //             answ = arr[1];
    //         } else if (actualHour < arr[3]) {
    //             answ = arr[2];
    //         } else if (actualHour < arr[4]) {
    //             answ = arr[3];
    //         } else if (actualHour < arr[5]) {
    //             answ = arr[4];
    //         } else if (actualHour < arr[6]) {
    //             answ = arr[5];
    //         } else if (actualHour < arr[7]) {
    //             answ = arr[6];
    //         } else if (actualHour < arr[8]) {
    //             answ = arr[7];
    //         } else if (actualHour < arr[9]) {
    //             answ = arr[8];
    //         } else if (actualHour < arr[10]) {
    //             answ = arr[9];
    //         } else if (actualHour == 23 || actualHour == 24) {
    //             answ = arr[11];
    //         }
    //     } else if(value == 8) {
    //         if(actualHour < arr[1]) {
    //             answ = arr[1];
    //         } else if (actualHour < arr[2]) {
    //             answ = arr[1];
    //         } else if (actualHour < arr[3]) {
    //             answ = arr[2];
    //         } else if (actualHour < arr[4]) {
    //             answ = arr[3];
    //         } else if (actualHour < arr[5]) {
    //             answ = arr[4];
    //         } else if (actualHour < arr[6]) {
    //             answ = arr[5];
    //         } else if (actualHour < arr[7]) {
    //             answ = arr[6];
    //         } else if (actualHour < arr[8]) {
    //             answ = arr[7];
    //         } else if (actualHour < arr[9]) {
    //             answ = arr[8];
    //         } else if (actualHour == 24) {
    //             answ = arr[9];
    //         }
    //     } else if (value == 5) {
    //         if(actualHour < arr[1]) {
    //             answ = arr[1];
    //         } else if (actualHour < arr[2]) {
    //             answ = arr[1];
    //         } else if (actualHour < arr[3]) {
    //             answ = arr[2];
    //         } else if (actualHour < arr[4]) {
    //             answ = arr[3];
    //         } else if (actualHour < arr[5]) {
    //             answ = arr[4];
    //         } else if (actualHour == 24) {
    //             answ = arr[5];
    //         } else {
    //             answ = arr[0];
    //         }
    //     }
    //     return answ;
    // }

    // function dateParse(arr, value) {
    //     let dateActual = new Date(); 

    //     let month = monthToWord(dateActual.getMonth());
    //     let day = dayToWord(dateActual.getDay());
    //     let dayNum = dateActual.getDate();
    //     let year = dateActual.getFullYear();
    //     let hour = dateConvert(arr, value);
    //     let minutes = dateActual.getMinutes();
    //     let seconds = dateActual.getSeconds();
    //     // return `${day} ${month} ${dayNum} ${year} ${hour}:${minutes}:${seconds}`;
    //     return {
    //         month,
    //         day,
    //         dayNum,
    //         year,
    //         hour,
    //         minutes,
    //         seconds
    //     }
    // }

    // function monthToWord(num) {
    //     const arr = ['Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'];
    //     return arr[num];
    // }

    // function dayToWord(num) {
    //     const arr = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    //     return arr[num];
    // }

    // function countStart(arr, value, idHtml) {
    //     let ele = document.querySelector(`#${idHtml}`);

    //     setInterval(() => {
    //         let time = dateParse(arr, value);
    //         let t = getRemaingTime(time.days, time.hour, time.minutes, time.seconds);
    //         if(idHtml == 'arca') {
    //             ele.innerHTML = `${t.remainDays}d ${t.remainHours}:${t.remainMinutes}`;
    //         } else {
    //             ele.innerHTML = `${t.remainHours}:${t.remainMinutes}:${t.finalSeconds}`;
    //         }
    //     }, 1000);
    // }

    // const arr = [3, 7, 11, 15, 19, 23];
    // countStart(arr, 5, 'devilSquare');
    bringCountCharacters();
    bringCountAccount();
    bringCountGuilds();
    bringUsersOn();
    resetRanking();
    guildRanking();

</script>