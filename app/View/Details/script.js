// const js = document.createElement("script").setAttribute('src',"../../scripts/index.js");
// document.querySelector("head").appendChild(js);
window.onload = function(){
    const links = document.querySelectorAll('.tab-horizontal>.tab-head>a');
    const contents = document.querySelectorAll('.tab-horizontal>.tab-body>.tab-content');

    links.forEach((item)=>{
        item.addEventListener('click',()=>{
            handlessTabView(item);
        });
    });

    function handlessTabView(item){
        contents.forEach((content)=>{
            if(item.dataset.id == content.id){
                item.classList.add('active');
                content.classList.add('active');
            }else{
                content.classList.remove('active');
                links.forEach((it)=>{
                    if(item.dataset.id != it.dataset.id){
                        it.classList.remove('active');
                    }
                });
                
            }
        });
    }

    // Galeria images selected
    const imgGaleria = document.querySelectorAll('.galeria>img');
    const imgGaleria1 = document.querySelectorAll('.galeria>span');

    function swap(src){
        if(src != undefined){
            let prevImg = src.path[2].querySelector('img');
            prevImg.setAttribute('src',src.target.currentSrc);
        }
    }

    imgGaleria.forEach(item=>{
        item.addEventListener('click',swap);
    });
    imgGaleria1.forEach(item=>{
        item.addEventListener('click',swap1);
    });

    // Galeria images selected
        
    
    function swap1(src){
        if(src != undefined){
            let prevImg = src.path[4].querySelector('.picture>img');
            prevImg.setAttribute('src',src.target.currentSrc);
        }
    }

    const addCartShopping = document.querySelector('button[name="addCartShopping"]');
    const product = document.querySelector('[data-product="product"]');
    let formData = new FormData();
    formData.append('data',product.id);

    addCartShopping.addEventListener('click',el=>{
        fetch('/addCart', {
            method: 'POST',
            body: formData
        });
    });

    

}