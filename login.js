const form = document.getElementById('form');
const email = document.getElementById('email');
const password = document.getElementById('password');

form.addEventListener('input', checkInputs);

function checkInputs() {
	// trim to remove the whitespaces
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();

	
	if(emailValue === '') {
		setErrorFor(email, 'Email cannot be blank');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
		setSuccessFor(email);
	}
	
	if(passwordValue === '') {
		setErrorFor(password, 'Password cannot be blank');
	} else {
		setSuccessFor(password);
	}
	
}

function checkAll() {
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();

    if (
        emailValue ===''||
        passwordValue ===''
    ) {
		alert('Please input required fields.');
        return false;
    } else {
        return true;
    }
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-con error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-con success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}











