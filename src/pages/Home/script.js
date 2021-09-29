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

const onVibrate = document.querySelector('.onVibrate');
let counterRange = 0;

onVibrate.addEventListener('mousedown',vibrate);
onVibrate.addEventListener('touchstart',vibrate);

const vibrate = (ms)=>{
    if(counterRange>=5){
        window.navigator.vibrate(ms | 1000);
        counterRange = 0;
    }else{
        counterRange++;
    }
}