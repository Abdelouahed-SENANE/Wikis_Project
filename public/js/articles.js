
// Multi SELECT OBject ====



// Validation Form Wikis
const overlayForm = document.getElementById('overlayForm');
const formWikis = document.getElementById('formWikis');
const titleWiki = document.getElementById('titleWiki');
const titleErr = document.getElementById('titleErr');
const contentWiki = document.getElementById('contentWiki');
const contentErr = document.getElementById('contentErr');
const imgWiki = document.getElementById('imgWiki');
const imgErr = document.getElementById('imgErr');
const categories = document.getElementById('categories');
const catErr = document.getElementById('catErr');
const tagErr = document.getElementById('tagErr'); 
const tags = document.getElementById('sel1');
const wiki_id = document.getElementById('id_wiki');
const submit = document.getElementById('submit');
const articleContainer = document.getElementById('articles-container');


formWikis.addEventListener('submit' , (e) => {
    e.preventDefault();
    var isAdd = !wiki_id.value;
    // Validate Title 
    if (titleWiki.value == '') {
        titleErr.innerText = 'Please Enter wiki title'
    }else {
        const titleRegex = /^[\w\s.,'"!?()-]+$/;
        if (!titleWiki.value.match(titleRegex)) {
            titleErr.innerText = 'Please enter a valid wiki Title'
        }else{
            titleErr.innerText = '';
        }  
    }
    // Validate Wiki Content
    if (contentWiki.value == '') {
        contentErr.innerText = 'Please Enter Content wiki'
    }else {
        const contentRegex = /^[\w\s\d.,'"!?()-]+$/;
        if (contentWiki.value.length < 20) {
            contentErr.innerText = 'Please enter more than 20 characters.'
        }
        // else if (!contentWiki.value.match(contentRegex)) {
        //     contentErr.innerText = 'Please enter a valid Title'
        // }
        else{
            contentErr.innerText = '';
        } 

    }
    // validate Images 
    if (imgWiki.value == '') {
        imgErr.innerText = 'Please upload image wiki';
    }else {
        imgErr.innerText = '';
    }
    // validate Categories
    if (categories.value == '') {
        catErr.innerText = 'Please Select category of wiki';
    }else {
        catErr.innerText = '';
    }
    // validate Categories
    if (tags.value == '') {
        tagErr.innerText = 'Please Select tag  of wiki';
    }else {
        tagErr.innerText = '';
    }

    if (!titleErr.innerText && !contentErr.innerText && !imgErr.innerText && !catErr.innerText && !tagErr.innerText) {
        // 
        if (isAdd) {
            var url = 'http://localhost/wikis/visitor/addArticles';
            var formData = new FormData(formWikis);

            fetch(url, {
                method : 'post',
                body : formData
            }).then(response => {
                if (!response.ok) {
                    throw new Error('Netword failed to response')
                }
                return response.json();
            }).then(data => {
                console.log(data.wikis);
                if (!data.success) {
                    imgErr.innerText = data.errors.imgErr;

                }else {
                    overlayForm.classList.add('hidden');
                    fetchArticles(data);

                }
            }).catch(error =>{
                console.error('Failed to Fetch response : ' + error );
            })

        }else{
            // =========== Update Form
            var url = 'http://localhost/wikis/visitor/updateArticle';
            var formData = new FormData(formWikis);

            fetch(url, {
                method : 'post',
                body : formData
            }).then(response => {
                if (!response.ok) {
                    throw new Error('Netword failed to response')
                }
                return response.json();
            }).then(data => {
                if (!data.success) {
                    imgErr.innerText = data.errors.imgErr;

                }else{
                    overlayForm.classList.add('hidden');
                    fetchArticles(data);
                }
            }).catch(error =>{
                console.error('Failed to Fetch response : ' + error );
            })
        }
        titleWiki.value = '';
        contentWiki.value = '';
        categories.value = '';
        imgWiki.value = '';
        tags.value = '';
    }
    












})
// ====================== EDIT BUTTON =======================
articleContainer.addEventListener('click' , (e) => {
    if (e.target.classList.contains('update')) {
        if (overlayForm.classList.contains('hidden')) {
            overlayForm.classList.remove('hidden')
            submit.innerText = 'Edit';
        }
        var id_wiki = e.target.getAttribute('data-update');
        var title_wiki = e.target.closest('.max-w-sm .parent').querySelector('.title').textContent;
        var content_wiki = e.target.closest('.max-w-sm .parent').querySelector('.content').textContent;
        var ID_category = e.target.closest('.max-w-sm .parent').querySelector('.category').getAttribute('id-category');

        
        titleWiki.value = title_wiki;
        contentWiki.value = content_wiki;
        wiki_id.value = id_wiki;
        // Fetch ALL CATEGORIES =============
        var url = 'http://localhost/wikis/visitor/fetchAllCategories';

        fetch(url , {
    
        method : 'GET'
        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        }).then(data => {
            categories.innerHTML = '';
                if (data.success) {
                    
                data.categories.forEach(category => {

                    if (ID_category == category.ID_category) {
                        categories.innerHTML += `
                        <option selected value="${category.ID_category}">${category.Category_Name}</option>
                    `
                    }else {
                        categories.innerHTML += `
                        <option value="${category.ID_category}">${category.Category_Name}</option>
                    `
                    }
                    
                });
            }
        }).catch(error => {
            console.error('Fetch error:', error);
        });

        // Fetch ALL TAGS =============
        var url = 'http://localhost/wikis/visitor/fetchAllTags';

        fetch(url , {
    
        method : 'GET'
        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        }).then(data => {
            // tags.innerHTML = '';
                if (data.success) {
                var tagsArr = data.tags;
                    tags.innerHTML = tagsArr.map(tag=> `<option class="text-gray-500" value="${tag.ID_tag}">${tag.Tag_name}</option>`);
                    tags.loadOptions();
            }else{
    
            }
        }).catch(error => {
            console.error('Fetch error:', error);
        });

    }
})



const open = document.getElementById('addBtn');
const searchTags = document.getElementById('search_tags');

if (open != null) {
    open.addEventListener('click', ()=> {
        titleWiki.value = '';
        contentWiki.value = '';
        categories.value = '';
        imgWiki.value = '';
        tags.value = '';
        if (overlayForm.classList.contains('hidden')) {
            overlayForm.classList.remove('hidden')
            submit.innerText = 'Add';
        }
        // Fetch ALL CATEGORIES =============
        var url = 'http://localhost/wikis/visitor/fetchAllCategories';
    
        fetch(url , {
    
        method : 'GET'
        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        }).then(data => {
            categories.innerHTML = '';
             if (data.success) {
                categories.innerHTML = `<option class="text-gray-300" selected value="">Select category</option>
                `
                data.categories.forEach(category => {
                    categories.innerHTML += `
                        <option value="${category.ID_category}">${category.Category_Name}</option>
                    `
                });
            }
        }).catch(error => {
            console.error('Fetch error:', error);
        });
    
        // Fetch ALL TAGS =============
        var url = 'http://localhost/wikis/visitor/fetchAllTags';
    
        fetch(url , {
    
        method : 'GET'
        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        }).then(data => {
            // tags.innerHTML = '';
             if (data.success) {
                var tagsArr = data.tags;
                 tags.innerHTML = tagsArr.map(tag=> `<option class="text-gray-500" value="${tag.ID_tag}">${tag.Tag_name}</option>`);
                 tags.loadOptions();
            }else{
    
            }
        }).catch(error => {
            console.error('Fetch error:', error);
        });
    
    
    }) 
}



const closeBtn = document.getElementById('close');
closeBtn.addEventListener('click', ()=> {
    overlayForm.classList.add('hidden')
}) 


function fetchArticles (data) {

    var isLogged = data.user_session;

    var wikis = data.wikis.slice(0 , 12)
    articleContainer.innerHTML = '';
    wikis.forEach(article => {
        articleContainer.innerHTML += `
        <div class="max-w-sm bg-white pb-5 relative  border overflow-hidden  border-gray-200 rounded-lg shadow-sm  dark:border-slate-200">
            <a href="#">
                <img class="rounded-t-lg" src="http://localhost/wikis/assets/upload/${article.Wiki_img}" alt="" class='max-h-[130px]'/>
            </a>
        <div class="p-5 parent">
            <a href="#">
                <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 title">${article.Wiki_title}</h5>
            </a>
            <span id-category="${article.ID_category}" class='category'> </span>
            <p class="mb-3 font-normal text-sm text-gray-700 text-ellipsis overflow-hidden text-nowrap content">${article.Wiki_content}</p>
            <a href="http://localhost/wikis/visitor/article?wiki_id=${article.ID_wiki}" class="inline-flex  items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-orange-600 focus:ring-2 focus:outline-none focus:ring-orange-300 ">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
            ${isLogged == article.ID_user ? `
            <div class="absolute bottom-2 right-2">
                <button class="bg-green-500 text-white p-1.5 rounded-md update" data-update="${article.ID_wiki}">
                    <svg clip-rule="evenodd" class="h-4 w-4 text-semibold pointer-events-none" fill="currentColor" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m21.897 13.404.008-.057v.002c.024-.178.044-.357.058-.537.024-.302-.189-.811-.749-.811-.391 0-.715.3-.747.69-.018.221-.044.44-.078.656-.645 4.051-4.158 7.153-8.391 7.153-3.037 0-5.704-1.597-7.206-3.995l1.991-.005c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-4.033c-.414 0-.75.336-.75.75v4.049c0 .414.336.75.75.75s.75-.335.75-.75l.003-2.525c1.765 2.836 4.911 4.726 8.495 4.726 5.042 0 9.217-3.741 9.899-8.596zm-19.774-2.974-.009.056v-.002c-.035.233-.063.469-.082.708-.024.302.189.811.749.811.391 0 .715-.3.747-.69.022-.28.058-.556.107-.827.716-3.968 4.189-6.982 8.362-6.982 3.037 0 5.704 1.597 7.206 3.995l-1.991.005c-.414 0-.75.336-.75.75s.336.75.75.75h4.033c.414 0 .75-.336.75-.75v-4.049c0-.414-.336-.75-.75-.75s-.75.335-.75.75l-.003 2.525c-1.765-2.836-4.911-4.726-8.495-4.726-4.984 0-9.12 3.654-9.874 8.426z" fill-rule="nonzero" />
                    </svg>
                </button>
                <button class="bg-rose-500 text-white p-1.5 rounded-md delete" id="delete" data-delete="${article.ID_wiki}">
                    <svg clip-rule="evenodd" class="h-4 w-4 pointer-events-none" fill="currentColor" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z" fill-rule="nonzero" />
                    </svg>
                </button>
            </div>
            ` : ``}
        </div>
    </div>
        `
    });

}

fetch('http://localhost/wikis/visitor/getAllArticles' , {

    method : 'GET',
    }).then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
    }).then(data => {
        
        fetchArticles(data)

    }).catch(error => {
        console.error('Fetch error:', error);
    });
    // Delete Wiki From Database 

    articleContainer.addEventListener('click' , (e) => {
        if (e.target.classList.contains('delete')) {

            var url = 'http://localhost/wikis/visitor/deleteArticle';

            const isConfirmed = window.confirm("Are you sure to Delete article");
            if (isConfirmed) {
                var id_wiki = e.target.getAttribute('data-delete');

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        id: id_wiki,
                    }),
                }).then(response => {
                    if (response.ok) {
                        return response.json();
                    }
                    throw new Error('Network Failed')
                }).then(data => {
                    fetchArticles(data);

                }).catch(error => {
                    console.error('ERROR FETCH DATA ' + error);
                })

            }

        }
    })

    // =============== SEARCH Wikis ==================
const searchWiki = document.getElementById('search_wikis');+
searchWiki.addEventListener('keyup' , () => {
    const searchVal = searchWiki.value.trim();
    var encodedString = encodeURIComponent(searchVal);
    fetch('http://localhost/wikis/visitor/findWiki?search='  + encodedString , {
         method : "GET",
         headers : {
             'Content-Type': 'application/json',
         },
         
    }).then(response => {
         if (!response.ok) {
             throw new Error('Network not OK');
         }
         return response.json();
    }).then(data => {
        fetchArticles(data)
    }).catch(error => {
         console.error('Error Fetch Data ' + error);
    })



})