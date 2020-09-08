(function () {
    let burgerButton = document.querySelector('.menu_burger');
    let burgerMenu = document.querySelector('.menu_title-wrapper');
    let sideBar = document.querySelector('.sidebar');
    let mobileMenu = document.querySelector('.mobile-navigation');
    let overlay = document.querySelector('.body-overlay');

    burgerButton.addEventListener('click', burgerClass);
    overlay.addEventListener('click', burgerClass);

    function burgerClass() {
        burgerButton.classList.toggle('active');
        burgerMenu.classList.toggle('active');
        sideBar.classList.toggle('active');
        overlay.classList.toggle('active');
        mobileMenu.classList.toggle('active');
    };


})();

(function () {
    let overlayBtn = document.querySelector('.buttons-overlay');

    let selectbtnRegion = document.querySelector('.selectbtn-region');
    let selectbtnDistrict = document.querySelector('.selectbtn-district');
    let selectbtnSort = document.querySelector('.selectbtn-sort');
    let peaExpselectbtnSort = document.querySelector('.peaexport-selectbtn-sort');
    let peaImpselectbtnSort = document.querySelector('.peaimport-selectbtn-sort');
    
    let selectbtnRegionMobile = document.querySelector('.selectbtn-region--mobile');
    let selectbtnDistrictMobile = document.querySelector('.selectbtn-district--mobile');
    let selectbtnSortMobile = document.querySelector('.selectbtn-sort--mobile');
    let peaExpselectbtnRegionMobile = document.querySelector('.peaexport-selectbtn-region--mobile');
    let peaImpselectbtnRegionMobile = document.querySelector('.peaimport-selectbtn-region--mobile');

    let btnArr = [
        selectbtnDistrict, selectbtnSort, 
        peaExpselectbtnSort,selectbtnRegion, selectbtnDistrictMobile,
        selectbtnRegionMobile, selectbtnSortMobile,
        peaExpselectbtnRegionMobile,
        peaImpselectbtnSort, peaImpselectbtnRegionMobile
    ];
      
    let selectbtnRegionBadge = document.querySelector('.selectbtn-region-badge');
    let selectbtnDistrictBadge = document.querySelector('.selectbtn-district-badge');
    let selectbtnSortBadge = document.querySelector('.selectbtn-sort-badge');
    let peaExpselectbtnSortBadge = document.querySelector('.peaexport-selectbtn-sort-badge');
    let peaImpselectbtnSortBadge = document.querySelector('.peaimport-selectbtn-sort-badge');

    let selectbtnRegionBadgeMobile = document.querySelector('.selectbtn-region--mobile-badge');
    let selectbtnDistrictBadgeMobile = document.querySelector('.selectbtn-district--mobile-badge');
    let selectbtnSortBadgeMobile = document.querySelector('.selectbtn-sort--mobile-badge');
    let peaExpselectbtnRegionBadgeMobile = document.querySelector('.peaexport-selectbtn-region--mobile-badge');
    let peaImpselectbtnRegionBadgeMobile = document.querySelector('.peaimport-selectbtn-region--mobile-badge');

    let bageArr = [
        selectbtnRegionBadge, selectbtnDistrictBadge, selectbtnSortBadge,
        peaExpselectbtnSortBadge,
        selectbtnRegionBadgeMobile, selectbtnDistrictBadgeMobile, selectbtnSortBadgeMobile,
        peaExpselectbtnRegionBadgeMobile,
        peaImpselectbtnSortBadge, peaImpselectbtnRegionBadgeMobile
    ];

    for (i = 0; i < btnArr.length; i++) {
        if (btnArr[i] !== null) {
        btnArr[i].addEventListener('click', classActive);
        }
    }

    function classActive() {
        for (i = 0; i < bageArr.length; i++) {
            if (bageArr[i] !== null) {
                bageArr[i].classList.remove('active');
            }
        }
        // this.childNodes[4].classList.toggle('active')
        this.children[2].classList.toggle('active')
        overlayBtn.classList.toggle('active')
    }       
   
    overlayBtn.addEventListener('click', classDisable);

    function classDisable() {
        for (i = 0; i < bageArr.length; i++) {
            if (bageArr[i] !== null) {
                bageArr[i].classList.remove('active');
            }
        }
        overlayBtn.classList.toggle('active')
    }

})();
