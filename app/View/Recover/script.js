// const js = document.createElement("script").setAttribute('src',"../../scripts/index.js");
// document.querySelector("head").appendChild(js);

const notification = document.querySelectorAll(".notification");

notification.forEach(el=>{
    const close = el.querySelector('a');
    console.log(close);
    close.addEventListener('click',item=>{
        el.remove();
    })
})

const openRecover = document.querySelector("button[name='open-modal-recover'");
const modal = document.querySelector('.modal');
const overlay = modal.querySelector('.overlay');
const closeModal = document.querySelector("button[name='close-modal']");

overlay.addEventListener('click',modalClose);
closeModal.addEventListener('click',modalClose);
openRecover.addEventListener('click',el=>{modal.style.display = "flex"});

function modalClose(el){modal.style.display = "none";}
