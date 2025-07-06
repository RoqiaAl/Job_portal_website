const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const confirm_password = document.getElementById('confirm_password');
const phone = document.getElementById('phone');
const address = document.getElementById('address');
const role = document.getElementById('role');

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs = () => {
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const confirm_passwordValue = confirm_password.value.trim();
    const addressValue = address.value.trim();
    const phoneValue = phone.value.trim();
    const roleValue = role.value.trim();

if(usernameValue === '') {
    setError(username, 'Username is required');
} else {
    setSuccess(username);
}

if(emailValue === '') {
    setError(email, 'Email is required');
} else if (!isValidEmail(emailValue)) {
    setError(email, 'Provide a valid email address');
} else {
    setSuccess(email);
}

if(passwordValue === '') {
    setError(password, 'Password is required');
} else if (passwordValue.length < 6 ) {
    setError(password, 'Password must be at least 6 character.')
} else {
    setSuccess(password);
}

if(confirm_passwordValue === '') {
    setError(confirm_password, 'Please confirm your password');
} else if (confirm_passwordValue !== passwordValue) {
    setError(confirm_password, "Passwords doesn't match");
} else {
    setSuccess(confirm_password);

}

if(addressValue === '') {
    setError(address, 'address is required');

} else {
    setSuccess(address);
}

if(phoneValue === '') {
    setError(phone, 'Phone number is required');
} else if (phoneValue.length < 8 ) {
    setError(phone, 'phone number is 9 character as least.')
} else {
    setSuccess(phone);
}

if(roleValue === '') {
    setError(role, 'Pleas check  user type');

} else {
    setSuccess(role);
}
};