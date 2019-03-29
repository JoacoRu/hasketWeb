window.onload = function() {

    async function bringAllPj() {
        const username = document.querySelector('input[name="username"]').value;
        const response = await fetch(`http://145.239.19.132:3001/charactersByAccount/${username}`);
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
                    <div class="card">
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
                                    <li>Resetear</li>
                                    <li>Añadir puntos</li>
                                </ul>
                            </div>
                        </div>
                    </div>`;
                }
            }
        }
    }

    function characterClass(numb) {
        let answer = '';
        if(numb == 0) {
            answer = 'Dark Wizard';
        } else if(numb == 1) {
            answer = 'Soul Master';
        } else if (numb == 2) {
            answer = 'Grand Master';
        } else if (numb == 16) {
            answer = 'Dark Knight';
        } else if (numb == 17) {
            answer = 'Blade Knight';
        } else if (numb == 18) {
            answer = 'Blade Master';
        } else if (numb == 32) {
            answer = 'Elf';
        } else if (numb == 33) {
            answer = 'Muse Elf';
        } else if (numb == 34) {
            answer = 'High Elf';
        } else if (numb == 48) {
            answer = 'Magic Gladiator';
        } else if (numb == 49) {
            answer = 'Duel Master';
        } else if (numb = 50) {
            answer = 'Duel Master';
        } else if (numb == 64) {
            answer = 'Dark Lord';
        } else if (numb == 66) {
            answer = 'Lord Emperor';
        } else if (numb == 65) {
            answer = 'Lord Emperor';
        } else if (numb == 80) {
            answer = 'Summoner';
        } else if (numb == 81) {
            answer = 'Bloody Summoner';
        } else if (numb == 82) {
            answer = 'Dimension Master';
        } else if (numb == 96) {
            answer = 'Rage Fighter';
        } else if (numb == 97) {
            answer = 'Rage Fighter';
        } else if (numb == 98) {
            answer = 'First Master';
        } else if (numb == 122) {
            answer = 'Grow Lancer';
        } else {
            answer = 'undefined';
        }

        return answer;
    }

    function characterImage(numb) {
        let answer = '';
        if(numb == 0 || numb == 1 || numb == 2) {
            answer = 'sm';
        } else if(numb == 16 || numb == 17 || 18) {
            answer = 'bk';
        } else if (numb == 32 || numb == 33 || numb == 34) {
            answer = 'elf';
        } else if ( numb == 48 || numb == 49 || numb == 50) {
            answer = 'mg';
        } else if (numb == 64 || numb == 66 || numb == 65) {
            answer = 'dl';
        } else if (numb == 80 || numb == 82 || numb == 82) {
            answer = 'sum';
        } else if (numb == 96 || numb == 97 || numb == 98) {
            answer = 'rf';
        } else if (numb == 122) {
            answer = 'grow_lancer';
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

    bringAllPj();
    menuInteractive();
}