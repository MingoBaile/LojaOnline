const imgGaleria = document.querySelectorAll('.galeria>span');
function swap(src){
    if(src != undefined){
        let prevImg = src.path[4].querySelector('.picture>img');
        prevImg.setAttribute('src',src.target.currentSrc);
    }
}

imgGaleria.forEach(item=>{
    item.addEventListener('click',swap);
});