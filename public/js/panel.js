'use strict';
window.onload = function() {

    async function bringAllPj() {
        const username = document.querySelector('input[name="username"]').value;
        const response = await fetch(`./api/bringPjByUserName/${username}`);
        const json = await response.json();
        renderCharacters(json);
    }

    function renderCharacters(obj) {
        let appendHTML = document.querySelector('.pjContainer');
        if(Object.keys(obj).length == 0) {
            appendHTML.innerHTML = `
            <div class="alert alert-danger">
                <strong>Todavia no hay creado ningun personaje</strong>
            </div>`;
        } else {
            for (const i in obj) {
                if (obj.hasOwnProperty(i)) {
                    const element = obj[i];
                    appendHTML.innerHTML += `
                    <div class="card" id="card">
                        <img src="images/personajes/${characterImage(element.Class)}.png" alt="Avatar" style="width:100%">
                        <div class="container-card">
                            <h4><b>${element.Name}</b></h4>
                            <div class="card-info">
                                <p>Resets: ${element.RESETS}</p>
                                <p>Nivel: ${element.cLevel}</p>
                                <p>Master Level: ${element.mLevel}</p>
                                <p>Puntos: ${element.LevelUpPoint}</p>
                                <p>Nivel Pk: ${element.PkLevel}</p>
                                <p>Clase: ${characterClass(element.Class)}</p>
                            </div>
                            <div class="card-buttons">
                                <ul class="ul-card">
                                    <li>Limpiar Pk</li>
                                    <li class="reset" lala="doAReset('${element.Name}', ${element.Money}, ${element.cLevel}, ${element.RESETS}, ${element.LevelUpPoint}, ${element.PkCount}, ${element.PkLevel}, ${element.CtlCode}, ${element.FruitPoint}, ${element.Married}, ${element.mlNextExp}, ${element.WinDuels}, ${element.LoseDuels}, ${element.Grand_Resets})">Resetear</li>
                                    <li onclick="return addPoints('${element.Name}', ${element.LevelUpPoint}, ${element.Strength}, ${element.Dexterity}, ${element.Vitality}, ${element.Energy}, ${element.PkCount}, ${element.PkLevel}, ${element.CtlCode}, ${element.FruitPoint}, ${element.Married}, ${element.mlNextExp}, ${element.WinDuels}, ${element.LoseDuels}, ${element.Grand_Resets}, ${element.Money}, ${element.RESETS}, ${element.cLevel})">Añadir puntos</li>
                                </ul>
                            </div>
                        </div>
                    </div>`;
                }
            }
            reset();
        }
    }

    function reset() {
        let card = document.getElementsByClassName('reset');
        for (const i of card) {
            i.addEventListener('click', function() {
                let func = i.getAttribute('lala');
               eval(func); 
            });
        }
    }

    function characterClass(numb) {
        let answer = '';
        switch (numb) {
            case 0:
                answer = 'Dark Wizard';
                break;

            case 1:
                answer = 'Soul Master';
                break;

            case 2:
                answer = 'Grand Master';
                break;

            case 16:
                answer = 'Dark Knight';
                break;

            case 17:
                answer = 'Blade Knight';
                break;

            case 18:
                answer = 'Blade Master';
                break;

            case 32:
                answer = 'Elf';
                break;

            case 33:
                answer = 'Muse Elf';
                break;

            case 34:
                answer = 'High Elf';
                break;

            case 48:
                answer = 'Magic Gladiator';
                break;

            case 49:
                answer = 'Duel Master';
                break;

            case 50:
                answer = 'Duel Master';
                break;

            case 64:
                answer = 'Dark Lord';
                break;

            case 66:
                answer = 'Dark Lord';
                break;

            case 65:
                answer = 'Lord Emperor';
                break;

            case 80:
                answer = 'Summoner';
                break;

            case 81:
                answer = 'Bloody Summoner';
                break;

            case 82:
                answer = 'Dimension Master';
                break;

            case 96:
                answer = 'Rage Fighter';
                break;

            case 97:
                answer = 'Rage Fighter';
                break;

            case 98:
                answer = 'First Master';
                break;

            case 122:
                answer = 'Grow Lancer';
                break;
        
            default:
                answer = 'Undefined';
                break;
        }

        return answer;
    }

    function characterImage(numb) {
        let answer = '';

        switch (numb) {
            case 0:
                answer = 'sm';
                break;

            case 1:
                answer = 'sm';
                break;

            case 2:
                answer = 'sm';
                break;

            case 16:
                answer = 'bk';
                break;

            case 17:
                answer = 'bk';
                break;

            case 18:
                answer = 'bk';
                break;

            case 32:
                answer = 'elf';
                break;

            case 33:
                answer = 'elf';
                break;

            case 34:
                answer = 'elf';
                break;

            case 48:
                answer = 'mg';
                break;

            case 49:
                answer = 'mg';
                break;

            case 50:
                answer = 'mg';
                break;

            case 64:
                answer = 'dl';
                break;

            case 66:
                answer = 'dl';
                break;

            case 65:
                answer = 'dl';
                break;

            case 80:
                answer = 'sum';
                break;

            case 81:
                answer = 'sum';
                break;

            case 82:
                answer = 'sum';
                break;

            case 96:
                answer = 'rf';
                break;

            case 97:
                answer = 'rf';
                break;

            case 98:
                answer = 'rf';
                break;

            case 122:
                answer = 'grow_lancer';
                break;
        }

        return answer;
    }

    function menuInteractive() {
        let aPj = document.querySelector('#aCharacter');
        let aPass = document.querySelector('#aChangePass');
        let liPj = document.querySelector('#liCharacter');
        let liPass = document.querySelector('#liChangePass');
        let showsPj = document.querySelector('.pjContainer');
        let changePass = document.querySelector('.confirmarPass');
        
        if(showsPj.style.display == 'flex') {
            liPj.style.backgrounColor = 'grey';
            aPj.style.backgrounColor = 'grey';
        } else {
            liPj.style.backgrounColor = '#028090';
            aPj.style.backgrounColor = '#028090';
        }

        liPj.addEventListener('click', liCharacterDisplay);

        function liCharacterDisplay() {
            liPj.style.backgrounColor = '#028090';
            aPj.style.backgrounColor = '#028090';
            liPass.style.backgrounColor = 'grey';
            aPass.style.backgrounColor = 'grey';
            showsPj.style.display = 'flex';
            changePass.style.display = 'none';
            liPj.removeEventListener('click' ,liCharacterDisplay);
            liPass.addEventListener('click' ,liPassDisplay);
        }

        function liPassDisplay() {
            liPass.style.backgrounColor = '#028090;';
            aPass.style.backgrounColor = '#028090;';
            liPj.style.backgrounColor = 'grey';
            aPj.style.backgrounColor = 'grey';
            changePass.style.display = 'flex';
            showsPj.style.display = 'none';
            liPass.removeEventListener('click' ,liPassDisplay);
            liPj.addEventListener('click' ,liCharacterDisplay);
        }
    }

    function doAReset(username, zen, level, reset, LevelUpPoint, PkCount, PkLevel, CtlCode, FruitPoint, Married, mlNextExp, WinDuels, LoseDuels, Grand_Resets) {
        let obj = {};
        if(zen < 50000000) {
            obj.zen = `No tienes suficiente zen, necesitas ${howManyZen(zen)} para resetear `;
            showMessages(obj);
        } else {
            delete obj.zen;
        }

        if(level != 400) {
            obj.level = `Necesitas ser nivel 400 para poder resetear, tu nivel actual es ${level}`;
            showMessages(obj);
        } else {
            delete obj.level;
        }

        if(Object.keys(obj).length == 0) {
            resetear(username, zen, reset, LevelUpPoint, PkCount, PkLevel, CtlCode, FruitPoint, Married, mlNextExp, WinDuels, LoseDuels, Grand_Resets);
            console.log('reseteo');
        }
    }

    function howManyZen(zen) {
        return 50000000 - zen;
    }

    function resetear(username, zen, reset, LevelUpPoint, PkCount, PkLevel, CtlCode, FruitPoint, Married, mlNextExp, WinDuels, LoseDuels, Grand_Resets) {
        let zenFinal = zen - 50000000;
        let resetFinal = reset+1;
        let payload = {
            cLevel: 1,
            Money: zenFinal,
            RESETS: resetFinal,
            MapNumber: 0,
            Experience: 0,
            LevelUpPoint: LevelUpPoint,
            PkCount,
            PkLevel,
            CtlCode,
            FruitPoint,
            Married,
            mlNextExp,
            WinDuels,
            LoseDuels,
            Grand_Resets
        };

        fetch(`http://145.239.19.132:3001/characters/${username}`,
        {
            method: "PUT",
            body: JSON.stringify(payload),
            headers: {
                'Content-type': 'application/json; charset=utf-8',
                'Access-Control-Allow-Origin': '*',
                'Content-Length': '4'
            },
        })
        .then((data) => {
            console.log(data)
        })
        .catch((error) => {
            throw error;
        })
    }

    function showMessages(obj) {
        let containerError = document.querySelector('#msjError');
        let errorContent = document.querySelector('.msjErrorContent');

        if(obj) {
            containerError.style.display = 'flex';
            if(Object.keys(obj).length != 1) {
                if(obj.zen) {
                    errorContent.innerHTML += `${obj.zen} </br> </br>`;
                }
                
                if(obj.level) {
                    errorContent.innerHTML += `${obj.zen} </br> </br>`;
                }

                if(obj.points) {
                    errorContent.innerHTML += `${obj.points} </br> </br>`;
                }

                if(obj.str) {
                    errorContent.innerHTML += `${obj.str} </br> </br>`;
                }

                if(obj.agi) {
                    errorContent.innerHTML += `${obj.agi} </br> </br>`;
                }

                if(obj.sta) {
                    errorContent.innerHTML += `${obj.sta} </br> </br>`;
                }

                if(obj.enr) {
                    errorContent.innerHTML += `${obj.enr} </br> </br>`;
                }
            } else {
                if(obj.zen) {
                    errorContent.innerHTML = `${obj.zen}`;
                }
                
                if(obj.level) {
                    errorContent.innerHTML = `${obj.level}`;
                }

                if(obj.number) {
                    errorContent.innerHTML = `${obj.number}`;
                }

                if(obj.points) {
                    errorContent.innerHTML = `${obj.points}`;
                }

                if(obj.str) {
                    errorContent.innerHTML += `${obj.str}`;
                }

                if(obj.agi) {
                    errorContent.innerHTML += `${obj.agi}`;
                }

                if(obj.sta) {
                    errorContent.innerHTML += `${obj.sta}`;
                }

                if(obj.enr) {
                    errorContent.innerHTML += `${obj.enr}`;
                }
            }
        }
    }

    function addPoints(username, points, strength, dexterity, vitality, energy, PkCount, PkLevel, CtlCode, FruitPoint, Married, mlNextExp, WinDuels, LoseDuels, Grand_Resets, zen, reset, cLevel) {
        let pjContainer = document.querySelector('.pjContainer');
        let addPoints = document.querySelector('.menuAñadirPuntos');
        let puntos = document.querySelector('#puntos');
        let str = document.querySelector('#str');
        let agi = document.querySelector('#agi');
        let sta = document.querySelector('#sta');
        let enr = document.querySelector('#enr');
        pjContainer.style.display = 'none';
        addPoints.style.display = 'flex';
        puntos.innerHTML = `Puntos disponibles: ${points}`;
        str.innerHTML = `Fuerza: ${strength}`;
        agi.innerHTML = `Agilidad: ${dexterity}`;
        sta.innerHTML = `Stamina: ${vitality}`;
        enr.innerHTML = `Energia: ${energy}`;
        sendPoints(username, points, strength, dexterity, vitality, energy, PkCount, PkLevel, CtlCode, FruitPoint, Married, mlNextExp, WinDuels, LoseDuels, Grand_Resets, zen, reset, cLevel);
    }

    function sendPoints(username, points, strength, dexterity, vitality, energy, PkCount, PkLevel, CtlCode, FruitPoint, Married, mlNextExp, WinDuels, LoseDuels, Grand_Resets, Money, RESETS, cLevel) {
        let form = document.querySelector('#formPoints');
        let pjContainer = document.querySelector('.pjContainer');
        let addPoints = document.querySelector('.menuAñadirPuntos');
        form.addEventListener('submit', function(e){
            let str = this.fuerza;
            let agi = this.agilidad;
            let sta = this.stamina;
            let enr = this.energia;
            let obj = {};
            let sumStr = 0;
            let sumAgi = 0;
            let sumSta = 0;
            let sumEnr = 0;  
                              
            if(str.value != '') {
                sumStr = parseInt(str.value);
            }

            if(agi.value != '') {
                sumAgi = parseInt(agi.value);
            }

            if(sta.value != '') {
                sumSta = parseInt(sta.value);
            }

            if(enr.value != '') {
                sumEnr = parseInt(enr.value);
            }
            
            let totalPoints = sumStr + sumAgi + sumSta + sumEnr;
            if(totalPoints > points) {
                obj.points = `Has excedido la cantidad de puntos disponibles ${points}`;
            }

            if(parseInt(str.value) + strength > 65535) {
                obj.str = `Has alcanzado el limite de puntos de fuerza`;
            } else {
                delete obj.str;
            }

            if(parseInt(agi.value) + dexterity > 65535) {
                obj.agi = `Has alcanzado el limite de puntos de agilidad`;
                console.log(typeof agi.value);
            }  else {
                delete obj.agi;
            }

            if(parseInt(sta.value) + vitality > 65535) {
                obj.sta = "Has alcanzado el limite de puntos de agilidad";
            } else {
                delete obj.sta;
            }

            if (parseInt(enr.value) + energy > 65535) {
                obj.enr = "Has alcanzado el limite de puntos de energia";
            } else {
                delete obj.enr;
            }

            if(Object.keys(obj).length != 0) {
                showMessages(obj);
                e.preventDefault();
            } else {
                let finStr = parseInt(str.value) + strength;
                let finAgi = parseInt(agi.value) + dexterity;
                let finSta = parseInt(sta.value) + vitality;
                let finEnr = parseInt(enr.value) + energy;
                let finPoints = points - totalPoints;

                if(str.value == '') {
                    str.value = 0;
                    finStr = parseInt(str.value) + strength;
                }

                if(agi.value == '') {
                    agi.value = 0;
                    finAgi = parseInt(agi.value) + dexterity;
                }

                if(sta.value == '') {
                    sta.value = 0;
                    finSta = parseInt(sta.value) + vitality;
                }

                if(enr.value == '') {
                    enr.value = 0;
                    finEnr = parseInt(enr.value) + energy;
                }
                addStats(username, finPoints, finStr, finAgi, finSta, finEnr, PkCount, PkLevel, CtlCode, FruitPoint, Married, mlNextExp, WinDuels, LoseDuels, Grand_Resets, Money, RESETS, cLevel);
                e.preventDefault();
                setInterval(function() {
                    form.style.display = 'none';
                    pjContainer.style.display = 'flex';
                    form.submit();
                }, 5000)
            }
        });
    }

    function addStats(username, LevelUpPoint, Strength, Dexterity, Vitality, Energy, PkCount, PkLevel, CtlCode, FruitPoint, Married, mlNextExp, WinDuels, LoseDuels, Grand_Resets, Money, RESETS, cLevel) {

        let payload = {
            pass: 'hasketT%y6U/!1',
            LevelUpPoint,
            Strength,
            Dexterity,
            Vitality,
            Energy,
            PkCount,
            PkLevel,
            CtlCode,
            FruitPoint,
            Married,
            mlNextExp,
            WinDuels,
            LoseDuels,
            Money,
            RESETS,
            Grand_Resets,
            cLevel,
            Experience: 0
        };

        fetch(`http://145.239.19.132:3001/characters/${username}`,
        {
            method: "PUT",
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
    
    bringAllPj();
    menuInteractive();

    
}