let aside = document.querySelector('aside.side-menu');
let btn = document.querySelector('svg.menu-switch');
let isVisible =  false;

btn.addEventListener('click', toggleAside);

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

