function createImage(src){

    const image=document.createElement('img');
    image.src=src;
    return image;
    
    }

    function onThumbnailClick(event){
    
        const image = createImage(event.currentTarget.firstChild.src);
        document.body.classList.add('no-scroll');
        modalView.style.top = window.pageYOffset + 'px'; //scostam verticale della viewport rispett inizio pagina
        modalView.appendChild(image);
        modalView.classList.remove('hidden');
    }
    

    function onModalClick(){
        document.body.classList.remove('no-scroll');
        modalView.classList.add('hidden');
        modalView.innerHTML='';
    }
   
    const modalView=document.querySelector('#modal-view');
    const image=document.querySelectorAll('.contenitore');//seleziono tutti i contenitori


    for(let i of image){
       i.addEventListener('click', onThumbnailClick);//aggiungo l'evento a tutti i contenitori
    }
   
    modalView.addEventListener('click', onModalClick);
    
    