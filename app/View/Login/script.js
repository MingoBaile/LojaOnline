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