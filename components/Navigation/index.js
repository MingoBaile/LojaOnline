class Navigation extends HTMLElement{
    constructor(){
        super();

        const shadow = this.attachShadow({mode:'open'});
        // const template = document.getElementById('navigation');
        // const templateContent = template.content;
        const tp = document.createElement('template');
        tp.setAttribute('id','navigation');
        tp.innerHTML = `
            <nav>
                <div class="nav-container">
                    <slot name="brand"></slot>
                    <slot name="search"></slot>
                    <slot name="actions"></slot>
                </div>
            </nav>
        `;

        const bg = this.getAttribute('bg');
        this.style = `width:100%;`;

        const style = document.createElement('style');
        style.textContent = `
            nav{
                max-height:var(--scale-xextra);
                padding:var(--scale-medium) var(--scale-xbig);
                display:flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
            
                background:${bg =='' || bg==undefined ? '#181818'  : 'var(--color-'+bg+'-3)'};
            }
            
            nav .nav-container{
                width:var(--width-main);
                display:flex;
                gap:var(--scale-big);
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }

            @media only screen and (max-width: 1240px)  {
                nav .nav-container{
                    width:var(--width-fullscreen);
                }
            }
            
            @media only screen and (max-width:640px){
                nav .nav-container{
                    place-content: center center;
                }
                nav .nav-container a{
                    margin:0;
                }
                nav .nav-container button,nav .nav-container input{
                    display:none;
                }
            }
        `;
        shadow.appendChild(style);
        shadow.appendChild(tp.content.cloneNode(true));
    }
}


customElements.define('navigation-top',Navigation);