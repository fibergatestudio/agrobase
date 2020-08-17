(function (){
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
    }) ();