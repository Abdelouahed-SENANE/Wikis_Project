
import { validRegex } from "./config.js";



// Validation Formulaire 

const from = document.getElementById('formRegister');
const fieldUsername = document.getElementById('fieldUsername');
const userErr = document.getElementById('userErr');
const fieldEmail = document.getElementById('floating_email');
const emailErr = document.getElementById('emailErr');
const fieldPassword = document.getElementById('floating_password');
const passErr = document.getElementById('passErr');
const confirnPass = document.getElementById('floating_repeat_password');
const confirmErr = document.getElementById('confirmErr');


from.addEventListener('submit' , (e) => {
    e.preventDefault();
    // validattion username
    if (fieldUsername.value == '') {
        userErr.innerText = 'Please Enter username'
    }else {
        const usernameRegex = /^[a-zA-Z0-9_.-]{3,20}$/;
        if (!validRegex(fieldUsername , usernameRegex)) {
            userErr.innerText = 'Please enter a valid username (3-20 characters, alphanumeric, _, ., -)' 
        }else{
            userErr.innerText = '';
        }  
    }
    // validation Email 
    if (fieldEmail.value == '') {
        emailErr.innerText = 'Please Enter email'
    }else {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!validRegex(fieldEmail , emailRegex)) {
            emailErr.innerText = 'Please enter a valid email' 
        }else{
            emailErr.innerText = '';
        }  
    }
    // Valid password 
    if (fieldPassword.value == '') {
        passErr.innerText = 'Please Enter password'
    }else {
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
        if (!validRegex(fieldPassword , passwordRegex)) {
            passErr.innerText = 'Password must be at least 8 characters long and include at least one lowercase letter, one uppercase letter, and one digit.' 

        }else{
            passErr.innerText = '';
        }  
    }
    // field Confirm Password
    if (confirnPass.value !== fieldPassword.value) {
        confirmErr.innerText = 'Passwords do not match';
    }else{
        confirmErr.innerText = '';
    }

    if (!userErr.innerText && !emailErr.innerText && !passErr.innerText && !confirmErr.innerText) {

        const formData = new FormData(from)

        fetch('http://localhost/wikis/pages/addAuteur' , {
            method : 'POST',
            body : formData

        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        }).then(data => {
            if (data.success == true) {
                window.location.href = "http://localhost/wikis/pages/login?message=" + encodeURIComponent(data.message);
            }else{
                
            }

        }).catch(error => {
            console.error('Fetch error:', error);
        });
    }
    

}) 
// End validation Formulaire
