window.onload = function() {
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
    reset();

    
}