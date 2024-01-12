const categoryContaner = document.getElementById('categories-container');
function fetchCategories (data) {
    categoryContaner.innerHTML = '';
    data.forEach(category => {
        categoryContaner.innerHTML += `
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm  dark:border-slate-200">
        <a href="#">
            <img class="rounded-t-lg" src="http://localhost/wikis/assets/upload/${category.Img_category}" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 ">${category.Category_Name}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 ">${category.Category_Desc}</p>
            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-orange-600 focus:ring-2 focus:outline-none focus:ring-orange-300 ">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
        `
    });

}

fetch('http://localhost/wikis/admin/fetchAllCategories' , {

    method : 'GET'
}).then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
}).then(data => {
    var categories = data.categories.slice(0 , 12)
    fetchCategories(categories)

}).catch(error => {
    console.error('Fetch error:', error);
});