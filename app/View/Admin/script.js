const openModalEdit = document.querySelectorAll('button[data-open="modal-edit"]');
const modalEdit = document.getElementById('modal-edit');
const closeModalEdit = document.querySelector('button[data-close="modal-editl"]');
const overlay = modalEdit.querySelector('.overlay');

openModalEdit.forEach(item=>{
    item.addEventListener('click',el=>{
        getUser(el.target.id);
        let name = document.getElementById("name");
        let email = document.getElementById("email");
        modalEdit.style.display = "flex";
    });
});

overlay.addEventListener('click',modalClose);
closeModalEdit.addEventListener('click',modalClose);

function modalClose(el){modalEdit.style.display = "none";}

function getUser(id){
    let formData = new FormData();
    formData.append('data',id);
    fetch('/getUser', {
        method: 'POST',
        body: formData
    }).then(response => console.log(response.text()))
    .then((text)=>{
        console.log(text);
    })
}

const users = document.getElementById('users');
const products = document.getElementById('products');
const configs = document.getElementById('configs');

products.style.display = "none";
configs.style.display = "none";

const navlink = document.querySelectorAll('.nav-link a[data-target]');

navlink.forEach(link=>{
    link.addEventListener('click',event=>{
        event.preventDefault();
        target = event.target.getAttribute('data-target');
        switch (target) {
            case users.id:
                users.style.display = "flex";
                configs.style.display = "none";
                products.style.display = "none";
                break;
            case products.id:
                products.style.display = "flex";
                users.style.display = "none";
                configs.style.display = "none";
                break;
            case configs.id:
                configs.style.display = "flex";
                users.style.display = "none";
                products.style.display = "none";
                break;
            default:
                users.style.display = "none";
                products.style.display = "none";
                configs.style.display = "none";
                break;
        }
    })
});



