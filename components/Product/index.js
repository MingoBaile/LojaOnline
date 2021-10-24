class Product extends HTMLElement{
    constructor(){
        super();
        this.build();
        console.log('Montado!!!')
    }

    build(){
        const shadow = this.attachShadow({mode:'open'});
        shadow.appendChild(this.styles());
        shadow.appendChild(this.template());
    }

    template(){
        const template = document.createElement('template');
        template.innerHTML = `
            <div class="card-product">
            <div class="picture">
                <span class="flex row justify-end">
                    <button class="px-3"><i data-feather="heart"></i></button>
                </span>
                <slot name="img"></slot>
                <div class="galeria hover-only">
                    <span>
                        <slot name="galeria-img"></slot>
                    </span>
                </div>
            </div>
            <div class="body">
                <a class="information" href="#product">
                    <slot name="title-product"></slot>
                    <slot name="title-descrition"></slot>
                </a>
                <div class="value hover-only">
                    <span class="flex row  align-center gap-3">
                        <i data-feather="dollar-sign"></i>
                        <span class="flex column gap-1 align-start values">
                            <slot name="value-default"></slot>
                            <slot name="price"></slot>
                        </span>
                    </span>
                    <div class="actions-card">
                        <button class="px-3 list-is-visible"><i data-feather="heart"></i></button>
                        <button class="px-3"><i data-feather="shopping-cart"></i></button>
                    </div>
                    
                </div>
            </div>
        </div>`;
        console.log(template.content);
        template.addEventListener('click',this.onClick.bind(this));
        return template.content.cloneNode(true);
    }

    styles(){
        const style = document.createElement('style');
        style.textContent = `
            .card-product{
                min-height:120px;
                max-height: 136px;
                background:var(--color-principal-light);
                border-radius:var(--radius-small);
                overflow: hidden;

                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                transition: all 400ms ease-in-out;
                border:0px solid transparent;
            }

            .card-product .hover-only{
                height:auto;
                opacity: 1;
            }

            .card-product:hover{
                box-shadow:0 0 0 1px rgba(0,0,0,.4);
            }

            .card-product>.picture{
                overflow: visible;
                padding:var(--scale-large);
                padding-right: 0;;
                background: transparent;
            }

            .card-product>.picture>img{
                width: 128px;
                border-radius:var(--radius-small);
                border:1px solid var(--color-neutral-3);
            }
            .card-product>.picture>span{
                display: none;
            }
            .card-product>.picture>.galeria{
                position: absolute;
                bottom:0;
                left:100%;
                width: 200%;
                display: flex;
                flex-direction: row;
                padding:var(--scale-medium) var(--scale-large);
                flex-wrap: nowrap;
                overflow-y: auto;
                gap:var(--scale-medium);
                justify-content: flex-start;
                align-items: center;
                background: transparent;
            }

            .card-product>.body{
                width: 100%;
                padding:var(--scale-large);
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                gap:var(--scale-medium);
            }
            .card-product>.body>.information{
                width: 100%;
            }
            .card-product>.body>.value{
                gap:var(--scale-large);
            }

            .card-product>.body>.value>.actions-card>.list-is-visible{
                display: none;
            }

            .card-product>.body>.value>.actions-card>.list-is-visible{
                display: block;
            }

            .card-product>.body>.value>.actions-card{
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                gap:var(--scale-medium);
            }

            .card-product{
                min-height:320px;
                max-height: 320px;
                background:var(--color-principal-light);
                border-radius:var(--radius-small);
                overflow: hidden;

                display: flex;
                flex-direction: column;
                justify-content: flex-start;
            }


            .card-product>.picture{
                background: var(--color-foreground-2);
                position: relative;
                display: flex;
                height:100%;
                overflow: hidden;
                flex-direction: column;
                justify-content: space-between;
            }

            .card-product>.picture>img{
                width:100%;
                min-height:100%;
                max-height:240px;
                object-fit: cover;
            }

            .card-product>.picture>span{
                position: absolute;
                z-index: 1090;
                top:0;
                right:0;
            }

            .card-product>.picture>.galeria{
                position: absolute;
                bottom:0;
                left:0;
                width: 100%;
                display: flex;
                flex-direction: row;
                padding:var(--scale-medium) var(--scale-large);
                flex-wrap: nowrap;
                overflow-y: auto;
                gap:var(--scale-medium);
                justify-content: flex-start;
                align-items: center;
                background: linear-gradient(0deg, rgba(0,0,0,.8), rgba(255,0,0,0));
            }

            .card-product>.picture>.galeria>span{
                list-style:none;
            }
            .card-product>.picture>.galeria.hover-only:empty{
                height:0;
                opacity: 0;
                display: none;
            }

            .card-product>.picture>.galeria>span:hover>img{
                border:2px solid var(--color-principal-dark);
                cursor: pointer;
            }

            .card-product>.picture>.galeria>span>img{
                width:var(--scale-big);
                height:var(--scale-big);
                border-radius: var(--radius-small);
                border:1px solid var(--color-neutral-3);
            }



            .card-product>.body{
                padding:var(--scale-large);
                display: flex;
                flex-direction: column;
                gap:var(--scale-medium);

            }

            .card-product>.body>a{
                text-decoration: none;
            }

            .card-product>.body>.information{
                display: flex;
                flex-direction: column;
            }

            .card-product>.body>.information h5{
                color:var(--color-neutral-5);
            }

            .card-product>.body>.information p{
                color:var(--color-neutral-3);
            }

            .card-product .hover-only{
                height:0;
                opacity: 0;
            }

            .card-product:hover .hover-only,
            .card-product:focus .hover-only,
            .card-product:focus-visible .hover-only,
            .card-product:focus-within .hover-only{
                animation: slide-down .400s both ease-in-out .100s;
            }

            .card-product:hover .galeria.hover-only,
            .card-product:focus .galeria.hover-only,
            .card-product:focus-visible .galeria.hover-only,
            .card-product:focus-within .hover-only{
                animation: slide-down .400s both ease-in-out .100s;
                /* padding:var(--scale-medium) var(--scale-large); */
            }

            .card-product>.body>.value{
                display:flex;
                justify-content: space-between;
            }
            .card-product>.body>.value>span>svg{
                color:var(--color-neutral-4);
            }

            .card-product>.body>.value .price{
                font-size:var(--font-headline-x4);
                color:var(--color-neutral-4);
                line-height: 1;
            }
            .card-product>.body>.value small{
                font-size:var(--font-captalize);
                font-weight: var(--font-weight-subbold);
                text-decoration: line-through;
                color:var(--color-feedback-negative-3);
                line-height: 1;
            }
        `;
        return style;
    }

    onClick(event){
        console.log(event);
    }
}

customElements.define('card-product',Product);