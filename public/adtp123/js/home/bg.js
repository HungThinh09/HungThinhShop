    var bg= document.querySelector('#bg-menu');
    var menu= document.querySelector('.navbar');
    var icon_bg=document.querySelector('#icon_bg');
   
    function bg_menu () {
        bg.addEventListener('change',function(){
         menu.classList.toggle('navbar-light');
         menu.classList.toggle('bg-light');
         menu.classList.toggle('navbar-dark');
         menu.classList.toggle('bg-dark');
         icon_bg.classList.toggle('btn-outline-dark');
         icon_bg.classList.toggle('btn-light');
         if(bg.checked==true){
            icon_bg.innerHTML=  "<ion-icon name='moon-outline'></ion-icon>"
         }else{
            icon_bg.innerHTML=  "<ion-icon name='partly-sunny-outline'></ion-icon>"
         }
        })
       }
 
 bg_menu ();