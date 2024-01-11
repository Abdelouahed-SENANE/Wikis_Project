import { validRegex } from "../config.js";



// Validation Formulaire 

const from = document.getElementById('formAdmin');
const fieldUsername = document.getElementById('username');
const userErr = document.getElementById('usernameErr');
const fieldEmail = document.getElementById('email');
const emailErr = document.getElementById('emailErr');
const fieldPassword = document.getElementById('password');
const passErr = document.getElementById('passErr');
const confirnPass = document.getElementById('confirm-password');
const confirmErr = document.getElementById('confirmErr');
const userContainer = document.getElementById('users-container');
const form = document.getElementById('overlayForm');



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
    if (confirnPass.value == '') {
        confirmErr.innerText = 'Please Enter confirm password';
        
    }
    else{
        if (confirnPass.value !== fieldPassword.value) {
            confirmErr.innerText = 'Passwords do not match';
        }else{
            confirmErr.innerText = '';
        }
    }

    if (!userErr.innerText && !emailErr.innerText && !passErr.innerText && !confirmErr.innerText) {

        const formData = new FormData(from)
        const addMessage = document.getElementById('addMessage');
        fetch('http://localhost/wikis/admin/addAdmin' , {
            method : 'POST',
            body : formData

        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        }).then(data => {
            if (data.success) {
                form.classList.add('hidden');
                addMessage.classList.remove('hidden')
                addMessage.innerText = data.message;
                setTimeout(function () { 
                    addMessage.classList.add('hidden')
                    addMessage.innerText = '';  
                    },5000)
                getDataFromDatabase(data.users);

            }

        }).catch(error => {
            console.error('Fetch error:', error);
        });
    }
    

}) 
// End validation Formulaire

// Function Display  Data From Database 
function getDataFromDatabase(data) {
    userContainer.innerHTML = '';
    data.forEach(user => {
        userContainer.innerHTML += `
            <tr>
                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap ID_user">
                    ${user.ID_user}
                </td>
                <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                    <div>
                        <img src="http://localhost/wikis/assets/upload/${user.Img_User}" alt="" class="w-12 h-12">
                    </div>
                </td>
                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                    ${user.Username}
                </td>
                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                    ${user.Email}
                </td>
                
                <td class="px-4 py-4 text-sm whitespace-nowrap">
                    ${user.Created_at}
                </td>
                
                <td class="px-4 py-4 text-sm whitespace-nowrap text-center">
                    <!-- Edit Button -->
                    <!-- <button class="px-1 py-1 text-gray-800 bg-gray-100 transition-colors duration-200 rounded-lg  hover:bg-slate-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                        </svg>
                    </button> -->
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

// Get data When Page Loaded 

fetch('http://localhost/wikis/admin/fetchAllUsers' , {

    method : 'GET'
}).then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
}).then(data => {
    var users = data.users
    getDataFromDatabase(users)

}).catch(error => {
    console.error('Fetch error:', error);
});

// Function Delete User 
const delMessage = document.getElementById('deleteMessage');
    userContainer.addEventListener('click' ,  (e) =>  {
        if (e.target.classList.contains('delete')) {
            var ID_user = e.target.closest('tr').querySelector('.ID_user').textContent.trim();

            fetch('http://localhost/wikis/admin/deleteUsers', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id: ID_user,
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
                    getDataFromDatabase(data.users)
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
            });
        
        }       


    })

// ========= Function to Search Data =============
const searchInput = document.getElementById('search_users');

searchInput.addEventListener('keyup' , () =>{
   var searchValue = searchInput.value.trim();
    var encodedString = encodeURIComponent(searchValue)
   fetch('http://localhost/wikis/admin/searchUsers?search='  + encodedString , {
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
        getDataFromDatabase(data.users)
   }).catch(error => {
        console.error('Error Fetch Data ' + error);
   })

})
