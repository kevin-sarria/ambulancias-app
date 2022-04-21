'use strict'

let btn_menu = document.querySelector('.icono_menu');
let menu = document.querySelector('.navegacion');


btn_menu.addEventListener('click', () => {
    if(menu.className.indexOf('mostrar_menu') > -1) {
        menu.classList.remove('mostrar_menu');
        enableScroll();
    }else {
        menu.classList.add('mostrar_menu');
        disableScroll();
    }
});

 window.setInterval( () => {
     let pantalla = window.screen.width;

     if(pantalla >= 1024) {
        menu.classList.remove('mostrar_menu');
         enableScroll();
     }

 }, 500);

function disableScroll(){  
    var x = window.scrollX;
    var y = window.scrollY;
    window.onscroll = function(){ window.scrollTo(x, y) };
}

function enableScroll(){  
    window.onscroll = null;
}