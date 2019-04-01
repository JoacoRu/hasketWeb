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
                                    <li onClick="return doAReset('${element.Name}', ${element.Money}, ${element.cLevel}, ${element.RESETS}, ${element.LevelUpPoint}, ${element.PkCount}, ${element.PkLevel}, ${element.CtlCode}, ${element.FruitPoint}, ${element.Married}, ${element.mlNextExp}, ${element.WinDuels}, ${element.LoseDuels}, ${element.Grand_Resets}, )">Resetear</li>
                                    <li onClick="return addPoints('${element.Name}', ${element.LevelUpPoint}, ${element.Strength}, ${element.Dexterity}, ${element.Vitality}, ${element.Energy}, ${element.PkCount}, ${element.PkLevel}, ${element.CtlCode}, ${element.FruitPoint}, ${element.Married}, ${element.mlNextExp}, ${element.WinDuels}, ${element.LoseDuels}, ${element.Grand_Resets}, ${element.Money}, ${element.RESETS}, ${element.cLevel})">Añadir puntos</li>
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

    

    bringAllPj();
    menuInteractive();
}