const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.incon-close');

registerLink.addEventListener('click', ()=> {
    wrapper.classList.add('active');
});

loginLink.addEventListener('click', ()=> {
    wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', ()=> {
    wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click', ()=> {
    wrapper.classList.remove('active-popup');
});

function login(){
    const un=document.getElementById('un').value;
    const pw=document.getElementById('pw').value;
    if(un==""){
    document.getElementById('msg').innerHTML="Blank User Name";
    return false;
    4
    }
    if(pw==""){
    document.getElementById('msg').innerHTML="Blank Password";
    return false;
    }
}

// Open the form when the navigation login button is clicked
document.querySelector('.btnLogin-popup').addEventListener('click', function() {
   
    // Reset the form
    document.getElementById('loginForm').reset();
});

// Close the form and clear the fields when the close icon is clicked
document.querySelector('.icon-close').addEventListener('click', function() {

    // Clear all input fields
    document.getElementById('loginForm').reset();
});


//////////////////////////////////////////////////////////////

// Close the registration form and clear the fields when the close icon is clicked
document.querySelector('.icon-close').addEventListener('click', function() {
    // Hide the registration form
    document.querySelector('.form-box.register').style.display = 'none';
    // Clear all input fields in the registration form
    document.getElementById('regForm').reset();
});

