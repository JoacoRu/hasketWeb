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
                    <p class="modulo_parrafo">x1500</p>
                </div>
                <div class="modulo_renglon">
                    <p class="modulo_parrafo">Drop</p>
                    <p class="modulo_parrafo">60%</p>
                </div>
                <div class="modulo_renglon">
                    <p class="modulo_parrafo">Version</p>
                    <p class="modulo_parrafo">S12</p>
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
                    <p class="modulo_parrafo">19:00-Chaos Castle</p>
                    <p class="modulo_parrafo">0:25:47</p>
                </div>

                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">20:00-Devil Square</p>
                    <p class="modulo_parrafo">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">20:00-Blood Castle</p>
                    <p class="modulo_parrafo">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">20:00-Moss Merchant</p>
                    <p class="modulo_parrafo">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">20:00-Castle Deep</p>
                    <p class="modulo_parrafo">0:25:47</p>
                </div>

                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">20:00-Skeleton King</p>
                    <p class="modulo_parrafo">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">20:00-Red Dragon</p>
                    <p class="modulo_parrafo">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">20:00-White Wizard</p>
                    <p class="modulo_parrafo">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">20:00-Medusa</p>
                    <p class="modulo_parrafo">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">20:00-Dragones Dorados</p>
                    <p class="modulo_parrafo">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">20:00-Moon Rabit</p>
                    <p class="modulo_parrafo">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">20:00-Ilusion Kundum</p>
                    <p class="modulo_parrafo">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">20:00-Ilusion Temple</p>
                    <p class="modulo_parrafo">0:25:47</p>
                </div>
                <div class="modulo_renglon modulo_eventos">
                    <p class="modulo_parrafo">20:00-Arca Battle</p>
                    <p class="modulo_parrafo">0:25:47</p>
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
    bringCountCharacters();
    bringCountAccount();
    bringCountGuilds();
    bringUsersOn();
    resetRanking();
    guildRanking();

</script>