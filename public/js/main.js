const burgerMenu = document.getElementById('burger_menu');
const navbar_links = document.getElementById('navbarSupportedContent3');

// Display navbar Menu 
burgerMenu.addEventListener('click' , () => {
    if (navbar_links.classList.contains('hidden')) {
        navbar_links.classList.remove('hidden');
    }else{
        navbar_links.classList.add('hidden');
    }
})

