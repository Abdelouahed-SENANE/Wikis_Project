import {validRegex , inputEmpty} from '../config.js';

// =============== DECLARATION VARIABLE ==============
const tagContainer = document.getElementById('tags-container');
const overlayForm = document.getElementById('overlayForm');
const tagName = document.getElementById('tagName');
const id_record = document.getElementById('id_tag')
const nameErr = document.getElementById('nameErr');
const tagForm = document.getElementById('formTag');
const openTagForm = document.getElementById('openAddTags');
const closeBtn = document.getElementById('closeBtn');



openTagForm.addEventListener('click' , () => {
    if (overlayForm.classList.contains('hidden')) {
        overlayForm.classList.remove('hidden');
        tagForm.reset();
        id_record.value = '';

    }
})
closeBtn.addEventListener('click' , () => {
    if (!overlayForm.classList.contains('hidden')) {
        overlayForm.classList.add('hidden');
    
    }
})

// =========== Fetch Data =============
function getDataFromDatabase(data) {
    tagContainer.innerHTML = '';
    data.forEach(tag => {
        tagContainer.innerHTML += `
            <tr>
                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap id_tag">
                    ${tag.ID_tag}
                </td>
                
                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap name_tag">
                    ${tag.Tag_name}
                </td>
                <td class="px-4 py-4 text-sm whitespace-nowrap">
                    ${tag.Created_at}
                </td>
                <td class="px-4 py-4 text-sm whitespace-nowrap">
                    ${tag.Updated_at === null ? 'No updates ' : 'Last Updated on ' + tag.Updated_at}
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
                    <button class="px-1 py-1  bg-rose-600 transition-colors duration-200 rounded-lg block   cursor-pointer hover:bg-red-500 delete" >
                        <svg class="w-6 h-6 text-white pointer-events-none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                        </svg>
                    </button>
                </td>
            </tr>
        `
    });
}

fetch('http://localhost/wikis/admin/fetchAllTags' , {

    method : 'GET'
}).then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
}).then(data => {
    var tags = data.tags.slice(0 , 8)

    getDataFromDatabase(tags)

}).catch(error => {
    console.error('Fetch error:', error);
});


// ================== ADD TAGS TO DATABASE ==========

tagForm.addEventListener('submit' , (e) => {
    e.preventDefault();

    // Validate Category Name 
    if (tagName.value == '') {
        nameErr.innerText = 'Please Enter Category name'
    }else {
        const usernameRegex = /^[a-zA-Z_.-\s]{3,20}$/;
        if (!validRegex(tagName , usernameRegex)) {
            nameErr.innerText = 'Please enter a valid username (3-20 characters, _, ., -)' 
        }else{
            nameErr.innerText = '';
        }  
    }
    // Sent Data To Server 
    // if ( !descErr.innerText && !nameErr.innerText) {
        if (!id_record.value) {

            if ( !nameErr.innerText) {
                let url = 'http://localhost/wikis/admin/addTags'
                let formData = new FormData(tagForm);
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
    
                    }else{
                        overlayForm.classList.add('hidden');
                        addMessage.classList.remove('hidden')
                        addMessage.innerText = data.message;
                        setTimeout(function () { 
                            addMessage.classList.add('hidden')
                            addMessage.innerText = '';  
                            },5000)
                        addMessage.innerText = data.message;
                        var tags = data.tags.slice(0 , 8)

                        getDataFromDatabase(tags)
                    }
                }).catch(error => {
                    console.error('Error fetch Data from Server '  + error);
                })
            }
        }else {
            if ( !nameErr.innerText) {
                let url = 'http://localhost/wikis/admin/updateTags'
                let formData = new FormData(tagForm);
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
    
                    }else{
                        overlayForm.classList.add('hidden');
                        addMessage.classList.remove('hidden')
                        addMessage.innerText = data.message;
                        setTimeout(function () { 
                            addMessage.classList.add('hidden')
                            addMessage.innerText = '';  
                            },5000)
                        addMessage.innerText = data.message;
                        var tags = data.tags.slice(0 , 8)

                        getDataFromDatabase(tags)                    }
                }).catch(error => {
                    console.error('Error fetch Data from Server '  + error);
                })
            }

        }


    // }
    
})
// get record to update 
tagContainer.addEventListener('click' , (e) =>{
    if (e.target.classList.contains('update')) {
        if (overlayForm.classList.contains('hidden')) {
            overlayForm.classList.remove('hidden')
        }
        var id_tag = e.target.closest('tr').querySelector('.id_tag').textContent.trim();
        var name_tag = e.target.closest('tr').querySelector('.name_tag').textContent.trim();

        id_record.value = id_tag;
        tagName.value = name_tag;
    }
})
// ============ DELETE RECORD ==========
const delMessage = document.getElementById('deleteMessage');
tagContainer.addEventListener('click' , (e) =>{
    if (e.target.classList.contains('delete')) {
        const isConfirmed = window.confirm("Are you sure to Delete Tag");
        if (isConfirmed) {
            var id_tag = e.target.closest('tr').querySelector('.id_tag').textContent.trim();
            fetch('http://localhost/wikis/admin/deleteTag', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                id: id_tag,
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
                 var tags = data.tags.slice(0 , 8)

                 getDataFromDatabase(tags)            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
        }


    }
})

