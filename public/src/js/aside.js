let aside;
let btn;
let isVisible;

$(document).ready(function () {
    aside = document.querySelector('aside.side-menu');
    btn = document.querySelector('svg.menu-switch');
    isVisible =  false;

    btn.addEventListener('click', toggleAside);
})


function toggleAside(){
    if(isVisible){
        aside.style.display = 'none';
        isVisible = false;
    }else{
        aside.style.display = 'flex';
        isVisible = true;
    }
}

function reapplyCss() {
    aside.style
}

