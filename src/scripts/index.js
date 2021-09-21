window.onload = function () {

    // Add script icons all project
    const icon = document.createElement('script');
    icon.setAttribute('src',"https://unpkg.com/feather-icons");
    document.querySelector('head').appendChild(icon);
    setTimeout(_=>{feather.replace();},600);

    // Button effect ripple
    const bt = document.querySelectorAll("button");
    bt.forEach((btn) =>
        btn.addEventListener("click", function (e) {
            let x = e.clientX - e.target.offsetLeft;
            let y = e.clientY - e.target.offsetTop;
            const ripple = document.createElement("span");
            ripple.style.left = x + "px";
            ripple.style.top = y + "px";
            this.appendChild(ripple);

            setTimeout(function (e) {
                ripple.remove();
            }, 600);
        })
    );

    const navbarBottom = document.querySelector("nav.navigation-bottom");
    lastScroll = window.scrollY;
    if(navbarBottom!=undefined){
        window.addEventListener('scroll',(_)=>{
            if(lastScroll < window.scrollY){
                navbarBottom.style.transform = 'translateY(56px)';
            }else {
                navbarBottom.style.transform = 'translateY(0)';
            }
            lastScroll = window.scrollY;
        });
    }

    function tableResize() {
        var thElm;
        var startOffset;
    
        Array.prototype.forEach.call(
          document.querySelectorAll("table th"),
          function (th) {
            th.style.position = 'relative';
    
            var grip = document.createElement('div');
            grip.innerHTML = "&nbsp;";
            grip.style.top = 0;
            grip.style.height = '100%';
            grip.style.userSelect = 'none';
            grip.style.right = 0;
            grip.style.bottom = 0;
            grip.style.width = '8px';
            grip.style.position = 'absolute';
            grip.style.cursor = 'e-resize';
            grip.addEventListener('mousedown', function (e) {
                thElm = th;
                startOffset = th.offsetWidth - e.pageX;
            });
    
            th.appendChild(grip);
          });
    
        document.addEventListener('mousemove', function (e) {
          if (thElm) {
            thElm.style.width = startOffset + e.pageX + 'px';
          }
        });
    
        document.addEventListener('mouseup', function () {
            thElm = undefined;
        });
    }
    
    tableResize();
};