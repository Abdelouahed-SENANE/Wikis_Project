import {validRegex , inputEmpty} from '../config.js';

// Validarion Form ==========================
const formCategory = document.getElementById('formCategory');
const formEditCategory = document.getElementById('formEditCategory');
const categoryName = document.getElementById('nameCategory');
const nameErr = document.getElementById('nameErr');
const categoryDesc = document.getElementById('categoryDesc');
const descErr = document.getElementById('descErr');
const categoryImg = document.getElementById('imageCategory');
const imgErr = document.getElementById('imgErr');
const overlayForm = document.getElementById('overlayForm');
const overlayEditForm = document.getElementById('overlayEditForm');



// ============ ADD FORM =====================
formCategory.addEventListener('submit' , (e) => {
    e.preventDefault();

    // Validate Category Name 
    if (categoryName.value == '') {
        nameErr.innerText = 'Please Enter Category name'
    }else {
        const usernameRegex = /^[a-zA-Z_.-]{3,20}$/;
        if (!validRegex(categoryName , usernameRegex)) {
            nameErr.innerText = 'Please enter a valid username (3-20 characters, _, ., -)' 
        }else{
            nameErr.innerText = '';
        }  
    }
    // Validate Category Description 
    if (categoryDesc.value == '') {
        descErr.innerText = 'Please Enter Category description'
    }else {
        const descriptionRegex = /^[a-zA-Z0-9\s.,!?()'-]+$/;
        if (!validRegex(categoryDesc , descriptionRegex)) {
            descErr.innerText = 'Invalid character in the description'; 
        }else{
            descErr.innerText = '';
        }  
    }

    // Validate Category Images 
    if (categoryImg.value == '') {
        imgErr.innerText = 'Please upload image category'
    }else {
        imgErr.innerText = ''
    }
    // Sent Data To Server 
    // if ( !descErr.innerText && !nameErr.innerText) {
        
                if ( !descErr.innerText && !nameErr.innerText && !imgErr.innerText) {
                    let url = 'http://localhost/wikis/admin/addCategories'
                    let formData = new FormData(formCategory);
                    const  addMessage = document.getElementById('addMessage');
            
                    fetch(url , {
                        method : 'POST',
                        body : formData
                    }).then(response => {
                        if (!response.ok) {
                            throw new Error('Network not was good')
                        }
                        return response.json();
                    }).then(data => {
                        if (!data.success) {
                            imgErr.innerText = data.errors.imgErr;
                        }else{
                            overlayForm.classList.add('hidden');
                            addMessage.classList.remove('hidden')
                            addMessage.innerText = data.message;
                            setTimeout(function () { 
                                addMessage.classList.add('hidden')
                                addMessage.innerText = '';  
                                },5000)
                            addMessage.innerText = data.message;
                            getDataFromDatabase(data.categories)
                        }
                    }).catch(error => {
                        console.error('Error fetch Data from Server '  + error);
                    })
                }
            
            

        





    // }
    
})
// Get Data From Data base 
const categoryContainer = document.getElementById('category-container');
function getDataFromDatabase(data) {
    categoryContainer.innerHTML = '';
    data.forEach(category => {
        categoryContainer.innerHTML += `
            <tr>
                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap ID_category">
                    ${category.ID_category}
                </td>
                
                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap name_category">
                    ${category.Category_Name}
                </td>
                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap desc_category">
                    ${category.Category_Desc}
                </td>
                <td class="px-12 py- text-sm font-medium whitespace-nowrap img_category">
                    <div>
                        <img src="http://localhost/wikis/assets/upload/${category.Img_category}" alt="" class="w-8 h-8 rounded-full">
                    </div>
                </td>
                <td class="px-4 py-4 text-sm whitespace-nowrap">
                    ${category.Created_at}
                </td>
                
                <td class="px-4 py-4 text-sm flex items-center gap-1 whitespace-nowrap text-center">
                    <!-- Edit Button -->
                    <button id="openEditForm" class="px-1 py-1 text-gray-800 bg-gray-100 transition-colors duration-200 rounded-lg  hover:bg-slate-500 hover:text-white update">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 
                         pointer-events-none" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                        </svg>
                    </button>
                    <!-- delete button -->
                    <button class="px-1 py-1  bg-rose-600 transition-colors duration-200 rounded-lg block   cursor-pointer hover:bg-red-500 delete" onclick="confirm('Are you Sure')">
                        <svg class="w-6 h-6 text-white pointer-events-none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                        </svg>
                    </button>
                </td>
            </tr>
        `
    });

}

// Fetch Data From Data Base When Loded Page

// Get data When Page Loaded 

fetch('http://localhost/wikis/admin/fetchAllCategories' , {

    method : 'GET'
}).then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
}).then(data => {
    getDataFromDatabase(data.categories)

}).catch(error => {
    console.error('Fetch error:', error);
});

// ============== REQUESST TO DELETE CATEGORY FROM DATABASE ======
const delMessage = document.getElementById('deleteMessage');
categoryContainer.addEventListener('click' , (e) => {

    if (e.target.classList.contains('delete')) {
       var id_category = e.target.closest('tr').querySelector('.ID_category').textContent.trim();
       fetch('http://localhost/wikis/admin/deleteCategory', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            id: id_category,
        }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                delMessage.classList.remove('hidden')
                delMessage.innerText = data.message;
                setTimeout(function () { 
                    delMessage.classList.add('hidden')
                    delMessage.innerText = '';  
                },5000)
                getDataFromDatabase(data.categories)
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });


    }



})


// ========= Function to Search Data =============
const searchInput = document.getElementById('search_categories');

searchInput.addEventListener('keyup' , () =>{
   var searchValue = searchInput.value.trim();
    var encodedString = encodeURIComponent(searchValue)
   fetch('http://localhost/wikis/admin/searchCategory?search='  + encodedString , {
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
        getDataFromDatabase(data.categories)
   }).catch(error => {
        console.error('Error Fetch Data ' + error);
   })

})
// ================== EDIT CATEGORY =====================
const categoryId = document.getElementById('id_category');
const editCategoryName = document.getElementById('editNameCategory');
const editNameErr = document.getElementById('editNameErr');
const editCategoryDesc = document.getElementById('editCategoryDesc');
const editDescErr = document.getElementById('editDescErr');
const editCategoryImg = document.getElementById('editImageCategory');
const editImgErr = document.getElementById('editImgErr');

categoryContainer.addEventListener('click' , (e) =>{
    if (e.target.classList.contains('update')) {
        if (overlayEditForm.classList.contains('hidden')) {
            overlayEditForm.classList.remove('hidden');
        }

        var id_category = e.target.closest('tr').querySelector('.ID_category').textContent.trim();
        var name_category = e.target.closest('tr').querySelector('.name_category').textContent.trim();
        var desc_category = e.target.closest('tr').querySelector('.desc_category').textContent.trim();

        categoryId.value = id_category
        editCategoryName.value = name_category;
        editCategoryDesc.value = desc_category;

        // ==================== 
        formEditCategory.addEventListener('submit' , (e) => {
            e.preventDefault();
        
            // Validate Category Name 
            if (editCategoryName.value == '') {
                editNameErr.innerText = 'Please Enter Category name'
            }else {
                const usernameRegex = /^[a-zA-Z_.-]{3,20}$/;
                if (!validRegex(editCategoryName , usernameRegex)) {
                    editNameErr.innerText = 'Please enter a valid username (3-20 characters, _, ., -)' 
                }else{
                    editNameErr.innerText = '';
                }  
            }
            // Validate Category Description 
            if (editCategoryDesc.value == '') {
                editDescErr.innerText = 'Please Enter Category description'
            }else {
                const descriptionRegex = /^[a-zA-Z0-9\s.,!?()'-]+$/;
                if (!validRegex(editCategoryDesc , descriptionRegex)) {
                    editDescErr.innerText = 'Invalid character in the description'; 
                }else{
                    editDescErr.innerText = '';
                }  
            }
        
            // Validate Category Images 
            if (editCategoryImg.value == '') {
                editImgErr.innerText = 'Please upload image category'
            }else {
                editImgErr.innerText = ''
            }
            // Sent Data To Server 
            // if ( !descErr.innerText && !nameErr.innerText) {
                
            if ( !editDescErr.innerText && !editNameErr.innerText && !editImgErr.innerText) {
                let url = 'http://localhost/wikis/admin/updateCategory'
                let formData = new FormData(formEditCategory);
                const  addMessage = document.getElementById('addMessage');
        
                fetch(url , {
                    method : 'POST',
                    body : formData
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Network not was good')
                    }
                    return response.json();
                }).then(data => {
                    if (!data.success) {
                        editImgErr.innerText = data.errors.imgErr;
                    }else{
                        overlayEditForm.classList.add('hidden');
                        inputEmpty(editCategoryImg , editCategoryDesc, editCategoryName)
                        addMessage.classList.remove('hidden')
                        addMessage.innerText = data.message;
                        setTimeout(function () { 
                            addMessage.classList.add('hidden')
                            addMessage.innerText = '';  
                            },5000)
                        addMessage.innerText = data.message;
                        getDataFromDatabase(data.categories)
                    }
                }).catch(error => {
                    console.error('Error fetch Data from Server '  + error);
                })
            }
                    
                    
        
                
        
        
        
        
        
            // }
            
        })

    }
})