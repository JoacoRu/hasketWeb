window.onload = function () {
    const noticia_1 = document.querySelector('#noticia_1');
    const noticia_2 = document.querySelector('#noticia_2');
    const noticia_3 = document.querySelector('#noticia_3');
    const noticia_4 = document.querySelector('#noticia_4');
    const tituloNoticia_1 = document.querySelector('#tituloNoticia_1');
    const tituloNoticia_2 = document.querySelector('#tituloNoticia_2');
    const tituloNoticia_3 = document.querySelector('#tituloNoticia_3');
    const tituloNoticia_4 = document.querySelector('#tituloNoticia_4');
    const tituloDescripcion_1 = document.querySelector('#tituloDescripcion_1');
    const tituloDescripcion_2 = document.querySelector('#tituloDescripcion_2');
    const tituloDescripcion_3 = document.querySelector('#tituloDescripcion_3');
    const tituloDescripcion_4 = document.querySelector('#tituloDescripcion_4');
    const buttonRead_1 = document.querySelector('#buttonRead_1');
    const buttonRead_2 = document.querySelector('#buttonRead_2');
    const buttonRead_3 = document.querySelector('#buttonRead_3');
    const buttonRead_4 = document.querySelector('#buttonRead_4');
    const buttonReadA_1 = document.querySelector('#buttonReadA_1'); 
    const buttonReadA_2 = document.querySelector('#buttonReadA_2');
    const buttonReadA_3 = document.querySelector('#buttonReadA_3');
    const buttonReadA_4 = document.querySelector('#buttonReadA_4');
    const leerMasButton = document.querySelector('#leerMasButton'); 
    const leerMasA = document.querySelector('#leerMasA');
    
    function newHover() {
        noticia_1.addEventListener('mouseover', () => {
            tituloNoticia_1.style.color = 'white';
            tituloDescripcion_1.style.color = 'white';
            buttonRead_1.style.backgroundColor = 'black';
            buttonReadA_1.style.color = 'white';
        });

        noticia_1.addEventListener('mouseleave', () => {
            tituloNoticia_1.style.color = 'rgba(255, 255, 255, 0.5)';
            tituloDescripcion_1.style.color = 'rgba(255, 255, 255, 0.5)';
            buttonRead_1.style.opacity = '0.3';
            buttonReadA_1.style.color = 'color: rgba(255, 255, 255, 0.3);'
        });

        noticia_2.addEventListener('mouseover', () => {
            tituloNoticia_2.style.color = 'white';
            tituloDescripcion_2.style.color = 'white';
            buttonRead_2.style.backgroundColor = 'black';
            buttonReadA_2.style.color = 'white';
        });

        noticia_2.addEventListener('mouseleave', () => {
            tituloNoticia_2.style.color = 'rgba(255, 255, 255, 0.5)';
            tituloDescripcion_2.style.color = 'rgba(255, 255, 255, 0.5)';
            buttonRead_2.style.opacity = '0.3';
            buttonReadA_2.style.color = 'color: rgba(255, 255, 255, 0.3);'
        });

        noticia_3.addEventListener('mouseover', () => {
            tituloNoticia_3.style.color = 'white';
            tituloDescripcion_3.style.color = 'white';
            buttonRead_3.style.backgroundColor = 'black';
            buttonReadA_3.style.color = 'white';
        });

        noticia_3.addEventListener('mouseleave', () => {
            tituloNoticia_3.style.color = 'rgba(255, 255, 255, 0.5)';
            tituloDescripcion_3.style.color = 'rgba(255, 255, 255, 0.5)';
            buttonRead_3.style.opacity = '0.3';
            buttonReadA_3.style.color = 'color: rgba(255, 255, 255, 0.3);'
        });
        
        noticia_4.addEventListener('mouseover', () => {
            tituloNoticia_4.style.color = 'white';
            tituloDescripcion_4.style.color = 'white';
            buttonRead_4.style.backgroundColor = 'black';
            buttonReadA_4.style.color = 'white';
        });

        noticia_4.addEventListener('mouseleave', () => {
            tituloNoticia_4.style.color = 'rgba(255, 255, 255, 0.5)';
            tituloDescripcion_4.style.color = 'rgba(255, 255, 255, 0.5)';
            buttonRead_4.style.opacity = '0.3';
            buttonReadA_4.style.color = 'color: rgba(255, 255, 255, 0.3);'
        });

        leerMasButton.addEventListener('mouseover', () => {
            leerMasButton.style.border = '2px solid #fff';
            leerMasA.style.color = '#333';
            leerMasA.style.transitionDuration = '2s';
            leerMasA.style.backgroundColor = '#fff';
        });

        leerMasButton.addEventListener('mouseleave', () => {
            leerMasButton.style.border = '2px solid rgba(255, 255, 255, 0.5)';
            leerMasA.style.color = 'rgba(255, 255, 255, 0.5)';
            leerMasA.style.backgroundColor = 'transparent';
        });
    }

    async function insertDataNews() {
        let response = await fetch('/api/news');
        let json = await response.json();
        let iterator = json.message;
        for (const i in iterator) {
            if (iterator.hasOwnProperty(i)) {
                const element = iterator[i];
                let leg = Object.keys(iterator).length;
                let titulo = document.querySelector(`#tituloNoticiaH5_${leg}`);
                let contenido = document.querySelector(`#tituloDescripcionP_${leg}`);
                let leerMas = document.querySelector(`#buttonReadA_${leg}`);
                let noticia = element.noticia;
                titulo.innerHTML = element.titulo;
                contenido.innerHTML = element.noticia.substring(1, 240);
                leerMas.setAttribute('href', `/oneNew/${leg}#allNewsIdWeb`);
                insertDataByNew(leg, element.titulo, noticia, element.id);
            }
        }
    }

    function insertDataByNew(noticia, tit, cont, leer) {

    }

    newHover();
    insertDataNews();  
}