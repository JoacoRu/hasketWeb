'use strict';
window.onload = function() {
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
    reset();

    
}