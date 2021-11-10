window.onload = function(){
    const buttonList = document.querySelector('section>.lead-actions>button:nth-child(1)');

    buttonList.addEventListener('click',(_)=>{
        const list = document.querySelector('section.list-products');
        list.classList.toggle('list');
        buttonList.classList.toggle('grid');
    });
}
