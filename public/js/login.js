import {validRegex} from './config.js'

var urlParams = new URLSearchParams(window.location.search);
var message = urlParams.get("message");
var displayMessage = document.getElementById('messageSucces');

// Display Message From Register form 
if (message != null) {
    if (displayMessage.classList.contains('hidden')) {
        displayMessage.classList.remove('hidden');
            displayMessage.innerText = message;
        setTimeout(() => {
            displayMessage.classList.add('hidden');
            displayMessage.innerText = '';
        } , 10000)
    }
}

// Validation Login 

const loginFrom = document.getElementById('loginForm');
const fieldEmail = document.getElementById('email');
const fieldPass = document.getElementById('password');
const errPass = document.getElementById('passErr');
const errEmail = document.getElementById('EmailErr');
const userErr = document.getElementById('UserErr');

loginFrom.addEventListener('submit' , (e) => {
    e.preventDefault();

        // validation Email 
        if (fieldEmail.value == '') {
            errEmail.innerText = 'Please Enter email'
        }else {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!validRegex(fieldEmail , emailRegex)) {
                errEmail.innerText = 'Please enter a valid email' 
            }else{
                errEmail.innerText = '';
            }  
        }
        // Valid password 
        if (fieldPass.value == '') {
            errPass.innerText = 'Please Enter password'
        }else {
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
            if (!validRegex(fieldPass , passwordRegex)) {
                errPass.innerText = 'Password must be at least 8 characters long and include at least one lowercase letter, one uppercase letter, and one digit.' 
    
            }else{
                errPass.innerText = '';
            }  
        }

        if (!errEmail.innerText  && !errPass.innerText) {
            
            let formData = new FormData(loginFrom)
            fetch('http://localhost/wikis/pages/verifyLogin', {
                method : 'post',
                body : formData
            }).then(respo => {
                if (!respo.ok) {
                    throw new Error('Network response was not ok');

                }
                return respo.json();
            }).then(data => {
                if (data.status == 'errorUser') {
                    userErr.innerHTML = `<span class="block text-sm mt-5 py-2 px-2">${data.message}</span>`
                }else {
                    if (data.status == 'errorPass') {
                        errPass.innerText = data.message;
                    }else {
                        window.location.href = 'http://localhost/wikis/visitor/tags';
                    }
                }
            }).catch(error => {
                console.error('Fetch error:', error);
            })



        }





})