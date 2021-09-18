// const js = document.createElement("script").setAttribute('src',"../../scripts/index.js");
// document.querySelector("head").appendChild(js);

const links = document.querySelectorAll('.tab-horizontal>.tab-head>a');
const contents = document.querySelectorAll('.tab-horizontal>.tab-body>.tab-content');

links.forEach((item)=>{
    item.addEventListener('click',()=>{
        this.handlessTabView(item);
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