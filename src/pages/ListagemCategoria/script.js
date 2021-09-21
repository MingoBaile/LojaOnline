// const js = document.createElement("script").setAttribute('src',"../../scripts/index.js");
// document.querySelector("head").appendChild(js);
window.onload = function(){


const buttonList = document.querySelector('section>.lead-actions>button:nth-child(1)');

buttonList.addEventListener('click',(_)=>{
    const list = document.querySelector('section.list-products');
    list.classList.toggle('list');
    buttonList.classList.toggle('grid');
});

const imgGaleria = document.querySelectorAll('.galeria>span');

function swap(src){
    console.log('aqui!');
    if(src != undefined){
        let prevImg = document.querySelector('.picture>img');
        console.log(prevImg.currentSrc,src);
    }
}

imgGaleria.forEach(item=>{
    console.log(item);
    item.addEventListener('click',swap.bind(this));
})

};

