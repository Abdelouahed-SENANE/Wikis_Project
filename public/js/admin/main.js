// Display Sidebar menu in Admin Panel 
const burgerSidebar = document.getElementById('sidebarMenu');
const sidebar = document.getElementById('sidebar');
const titles = document.querySelectorAll('.title');
const links = document.querySelectorAll('.link');
const icons = document.querySelectorAll('.icon')

// animation Sidebar 
burgerSidebar.addEventListener('click' , () => {
    if (sidebar.classList.contains('w-[70px]')) {
        sidebar.classList.remove('w-[70px]');
        sidebar.classList.add('w-[230px]');

        links.forEach((link) => {
            link.classList.remove('justify-center')
        })
        titles.forEach((title) => {
            title.classList.remove('hidden')
        })

    }else {
        sidebar.classList.remove('w-[230px]');
        sidebar.classList.add('w-[70px]');
        links.forEach((link) => {
            link.classList.add('justify-center')
        })
        titles.forEach((title) => {
            title.classList.add('hidden')
        })

    }
})
// ====== Display Form admmin

const openForm = document.getElementById('openBtn');
const closeForm = document.getElementById('closeBtn');
const form = document.getElementById('overlayForm');


openForm.addEventListener('click' , () => {
    if (form.classList.contains('hidden')) {
        form.classList.remove('hidden');
    }
})
closeForm.addEventListener('click' , () => {
    if (!form.classList.contains('hidden')) {
        form.classList.add('hidden');
    }
})