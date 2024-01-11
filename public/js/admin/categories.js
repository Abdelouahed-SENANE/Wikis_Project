import {validRegex} from '../config.js';

// Validarion Form ==========================
const formCategory = document.getElementById('formCategory');
const categoryName = document.getElementById('nameCategory');
const nameErr = document.getElementById('nameErr');
const categoryDesc = document.getElementById('categoryDesc');
const descErr = document.getElementById('descErr');
const categoryImg = document.getElementById('imageCategory');
const imgErr = document.getElementById('imgErr');



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
    if ( !descErr.innerText && !nameErr.innerText) {
        
        let url = 'http://localhost/wikis/admin/addCategories'
        let formData = new FormData(formCategory);
        let addMeassge = document.getElementById('addMessage');

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
                
            }
        }).catch(error => {
            console.error('Error fetch Data from Server '  + error);
        })

    }
    



})


