const dataModal = document.querySelectorAll('[data-modal]');
const dataOpen = document.querySelectorAll('[data-open]');

dataModal.forEach(modal=>{
    console.log(modal);
});

dataOpen.forEach(openModal=>{
    openModal.addEventListener('click',event=>{
        const id = openModal.getAttribute('data-open');
        const modal = document.getElementById(id);
        const overlay = modal.querySelector('.overlay');
        const close = modal.querySelector('button[data-close]');
        modal.style.display = "flex";
        overlay.addEventListener('click',event=>modal.style.display='none');
        close.addEventListener('click',event=>modal.style.display='none');
    });
});

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

document.getElementById('imgBanner').addEventListener('change', function(input){
  if (this.files[0] ) {
    var picture = new FileReader();
    picture.readAsDataURL(this.files[0]);
    picture.addEventListener('load', function(event) {
        const contentImg = document.createElement('span');
        const img = document.createElement('img');
        const trash = document.createElement('button');
        //const add = document.createElement('button');
        // const icon = document.createElement('i');
        img.setAttribute('src', event.target.result);
        contentImg.setAttribute('class','contentImg');
        trash.setAttribute('class','ghost small');
        //add.setAttribute('class','secondary small');
        // icon.setAttribute('data-feather','trash');
        // icon.setAttribute('class','icon-2');
        // add.addEventListener('click',item=>{
        //     item.preventDefault();
        //     input.target.value = '';
        //     input.target.click();
        // });

        trash.addEventListener('click',item=>{
            contentImg.remove();
            picture = new FileReader();
            input.target.value = '';
            input.target.style.display = 'flex';
        });
        //add.append("Adicionar mais");
        trash.append("Remover imagem");
        contentImg.append(img);
        //contentImg.append(add);
        contentImg.append(trash);
        input.path[1].append(contentImg);
        input.target.style.display = 'none';
    });
  }
});

// openModalEdit.forEach(item=>{
//     item.addEventListener('click',el=>{
//         getUser(el.target.id);
//         let name = document.getElementById("name");
//         let email = document.getElementById("email");
//         modalEdit.style.display = "flex";
//     });
// });

// function getUser(id){
//     let formData = new FormData();
//     formData.append('data',id);
//     fetch('/getUser', {
//         method: 'POST',
//         body: formData
//     })
//     // .then(response => console.log(response.text()))
//     // .then((text)=>{
//     //     console.log(text);
//     // })
// }