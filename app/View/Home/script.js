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

const vibrate = (ms)=>{
    if(counterRange>=5){
        window.navigator.vibrate(ms | 1000);
        counterRange = 0;
    }else if(ms.type =='touchstart'){
        window.navigator.vibrate(ms | 1000);
        counterRange = 0;
    }else{
        counterRange++;
    }
}

onVibrate.addEventListener('click',vibrate);
onVibrate.addEventListener('touchstart',vibrate);

const search = document.querySelector('#search');
search.addEventListener('keypress',e=>{
    if(e.key === 'Enter'){
        console.log(e.target.value);
        fetch('../search', {
            method: "POST",
            header: {"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"},
            body: Object.entries(creds).map(([k,v])=>{return k+'='+v}).join('&') // in jQuery simply use $.param(creds) instead
        })
    }
    
})


