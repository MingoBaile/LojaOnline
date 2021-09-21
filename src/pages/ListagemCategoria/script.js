// const js = document.createElement("script").setAttribute('src',"../../scripts/index.js");
// document.querySelector("head").appendChild(js);
window.onload = function(){
    const buttonList = document.querySelector('section>.lead-actions>button:nth-child(1)');

    buttonList.addEventListener('click',(_)=>{
        const list = document.querySelector('section.list-products');
        list.classList.toggle('list');
        buttonList.classList.toggle('grid');
    });

    // Galeria images selected
        
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
}
