class StarRater extends HTMLElement{
    constructor(){
      super();
      this.build();
    }
    
    build(){
      const shadow = this.attachShadow({mode:'open'});
      shadow.appendChild(this.styles());
      const rater = this.createRater();
      this.stars = this.createStars();
      this.stars.forEach(star => rater.appendChild(star));
      this.resetRating();
      shadow.appendChild(rater);
    }
    
    createRater(){
      const rater = document.createElement('div');
      rater.classList.add('star-rater');
      rater.addEventListener('mouseout',this.resetRating.bind(this));
      return rater;
    }
    
    createStars(){
      const createStar = (_,id) =>{
        const star = document.createElement('span');
        star.classList.add('star');
        star.setAttribute('data-value',Number(id)+1);
        // star.innerHTML = "<i data-feather='star'></i>";
        star.innerHTML = '&#9733;';
        star.addEventListener('click',this.setRating.bind(this));
        star.addEventListener('mouseover',this.setOverRating.bind(this));
        return star;
      };
      
      return Array.from({length:5},createStar);
    }
    
    resetRating(){
      this.currentRatingValue = this.getAttribute('data-rating') || 0;
      // this.currentRatingValue = this.dataset.rating || 0;
      this.hightlightRating();
    }
    
    setRating(event){
      this.setAttribute('data-rating',event.currentTarget.getAttribute('data-value'));
    }
    
    setOverRating(event){
      this.currentRatingValue = event.currentTarget.getAttribute('data-value');
      this.hightlightRating();
    }
    
    hightlightRating(){
      this.stars.forEach(star => {
        star.style.color = this.currentRatingValue >= star.getAttribute('data-value') ? 'var(--color-neutral-5)':'var(--color-neutral-2)'
      });
    }
    
    styles(){
      const style = document.createElement('style');
      style.textContent = `
        .star-rater{
          display:flex;
          gap:4px;
          user-select:none;
        }
        .star-rater>.star{
          font-size:1.6rem;
          color:gray;
          cursor:pointer;
        }
        .star-rater>.star:hover{
          color:var(--color-neutral-5);
        }
      `;
      return style;
    }
  }
  
  customElements.define('star-rater',StarRater);