      
function caricaContenuti(contenutoSuccessivo){
   console.log(contenutoSuccessivo);
  for(let i of contenutoSuccessivo){ /*i sarà la mia persona */

        let content=document.createElement("div");
            content.setAttribute('class', 'content');

        let sinistra=document.createElement("div");
            sinistra.setAttribute('class', 'sinistra');

        let sopra=document.createElement("div");
            sopra.setAttribute('class', 'sopra');

        let unico=document.createElement("div");
            unico.setAttribute('class','unico');
            unico.appendChild(sopra);
            
        let preferito=document.createElement("a");
            preferito.setAttribute('class', 'bottonePref');/*tag a */

        let simbpref=document.createElement("img");/*immagine + */
            simbpref.src="immagini/img2/remove-user.png";
            simbpref.setAttribute('class', 'simbpref');
            preferito.appendChild(simbpref);
      
        let circle=document.createElement("img"); /*logo palestra */
            circle.src="immagini/img2/circle.png";
      
        let titolo=document.createElement("h1"); /*nome persona*/ 
        let testo=document.createTextNode(i.nome+' '+i.cognome);
            titolo.appendChild(testo);
            sinistra.appendChild(titolo);
    

        let descr=document.createElement("p");
            descr.setAttribute('class','hidden');
          preferito.addEventListener('click', rimuoviPreferiti);
    
            content.appendChild(preferito);

            sopra.appendChild(circle);
            content.appendChild(descr);
            content.appendChild(sinistra);
            content.appendChild(unico);
            sinistra.appendChild(preferito);
            sinistra.appendChild(descr);
            persone.appendChild(content);     

      }
    }

    
    

    function filtroRicerca(event){
    let filtro=event.currentTarget.value.toUpperCase(); 
    let elementiDaFiltrare=persone.querySelectorAll(".content");

    console.log(elementiDaFiltrare);

    for(let i of elementiDaFiltrare){ 
      let titolo2=i.querySelector("h1").textContent.toUpperCase(); 
      if(titolo2.indexOf(filtro)>-1){ 
        i.style.display="";
      }else{
        i.style.display="none";
      }
    }
    }

    const input=document.querySelector("#filtro");
    input.addEventListener("keyup", filtroRicerca);

    

    /************************************************Rimuovi preferiti************************************************ */
    function rimuoviPreferiti(event){

        persone.removeChild(event.currentTarget.parentNode.parentNode);
        let titPre=event.currentTarget.parentNode.querySelector("h1").textContent;
        let nome=titPre.split(' ')[0];
        let cognome=titPre.split(' ')[1];

      const formdata = new FormData();
      formdata.append("nome", nome);
      formdata.append("cognome", cognome);

      fetch(route("eliminaAllievo", user), {method: "post",
      body: formdata});
     //eliminazione dal database
     
    }

     
      const nascondi=document.querySelector("#sezione0");
      const persone= document.querySelector(".persone");

 /**--------------------------------------------------API RANDOM USER------------------------------------------------------------- */
    function onJson(json){
        console.log(json);
        caricaContenuti(json[0].iscrizione2); 
      }
      function onJson2(json){
    
      }
      function onResponse(response) {
        return response.json();
      }

      fetch(route("allieviIscritti", user)).then(onResponse).then(onJson);