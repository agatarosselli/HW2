
  
  
  function closeNav() {
    document.querySelector("#menuLaterale").classList.toggle('attiva');
  }

  


  const openMenu=document.querySelector(".open");
  const closeMenu=document.querySelector(".close");


  openMenu.addEventListener('click', closeNav);
  closeMenu.addEventListener('click', closeNav);
closeNav();