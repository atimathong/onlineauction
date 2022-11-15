const form = document.getElementById('form');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password_2');
const firstname = document.getElementById('firstname');
const lastname = document.getElementById('lastname');
const addressline1 = document.getElementById('addressline_1');
const addressline2 = document.getElementById('addressline_2');
const postalcode = document.getElementById('postal_code');
const userType = document.getElementById('user_type');
const phonenumber= document.getElementById('phone_number');

form.addEventListener('input', checkInputs);

function checkInputs() {
	// trim to remove the whitespaces
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    const firstnameValue = firstname.value.trim();
    const lastnameValue = lastname.value.trim();
    const addressline1Value = addressline1.value.trim();
    const addressline2Value = addressline2.value.trim();
    const postalcodeValue = postalcode.value.trim();
    const userTypeValue = userType.value.trim();
    const phonenumberValue = phonenumber.value.trim();
	
	if(emailValue === '') {
		setErrorFor(email, 'Email cannot be blank');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
		setSuccessFor(email);
	}
	
	if(passwordValue === '') {
		setErrorFor(password, 'Password cannot be blank');
	} else if (passwordValue.length < 8) {
        setErrorFor(password, 'Minimum 8 characters');
    } else {
		setSuccessFor(password);
	}

    if(password2Value === '') {
        setErrorFor(password2,'Confirm password cannot be blank.');
    } else if(password2Value != passwordValue) {
        setErrorFor(password2,'Password does not match.');
    } else {
        setSuccessFor(password2);
    }

    if(firstnameValue === '') {
        setErrorFor(firstname,'First name cannot be blank.');
    } else {
        setSuccessFor(firstname);
    }

    if(lastnameValue === '') {
        setErrorFor(lastname,'Last name cannot be blank.');
    } else {
        setSuccessFor(lastname);
    }

    if(addressline1Value === '') {
        setErrorFor(addressline1,'Address line 1 cannot be blank.');
    } else {
        setSuccessFor(addressline1);
    }

    if(addressline2Value === '') {
        setErrorFor(addressline2,'Address line 1 cannot be blank.');
    } else {
        setSuccessFor(addressline2);
    }

    if(postalcodeValue === '') {
        setErrorFor(postalcode,'Postal code cannot be blank.');
    } else {
        setSuccessFor(postalcode);
    }

    if(userTypeValue === 'none') {
        setErrorFor(userType,'User type cannot be blank.');
    } else {
        setSuccessFor(userType);
    }

    if(phonenumberValue === '') {
        setErrorFor(phonenumber,'Phone number cannot be blank.');
    } else if(!isPhoneNum(phonenumberValue)) {
        setErrorFor(phonenumber,'Phone number is not valid.');
    } else  {
        setSuccessFor(phonenumber);
    }
	
}

function checkAll() {
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    const firstnameValue = firstname.value.trim();
    const lastnameValue = lastname.value.trim();
    const addressline1Value = addressline1.value.trim();
    const addressline2Value = addressline2.value.trim();
    const postalcodeValue = postalcode.value.trim();
    const userTypeValue = userType.value.trim();
    const phonenumberValue = phonenumber.value.trim();


    if (
        emailValue ===''||
        !isEmail(emailValue) ||
        !isPhoneNum(phonenumberValue) ||
        passwordValue ===''||
        password2Value ===''||
        firstnameValue ===''||
        lastnameValue ===''||
        addressline1Value ===''||
        addressline2Value ===''||
        postalcodeValue ===''||
        userTypeValue ==='none'||
        phonenumberValue ===''
    ) {
        alert('Please input all required fields.');
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


function isPhoneNum(phonenumber) {
    return /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/.test(phonenumber)
}








