const openModalEdit = document.querySelectorAll('button[data-open="modal-edit"]');
const modalEdit = document.getElementById('modal-edit');
const closeModalEdit = document.querySelector('button[data-close="modal-editl"]');

openModalEdit.forEach(item=>{
    item.addEventListener('click',el=>{
        getUser(el.target.id);
        let name = document.getElementById("name");
        let email = document.getElementById("email");
        modalEdit.style.display = "flex";
    });
});

closeModalEdit.addEventListener('click',el=>{
    modalEdit.style.display = "none";
});

function getUser(id){
    let formData = new FormData();
    formData.append('data',id);
    fetch('/getUser', {
        method: 'POST',
        body: formData
    });
}
