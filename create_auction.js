const form = document.getElementById('auction-form');
const auctionTitle = document.getElementById('auctionTitle');
const auctionDetails = document.getElementById('auctionDetails');
const auctionCategory = document.getElementById('auctionCategory');
const auctionCondition = document.getElementById('auctionCondition');
const auctionStartPrice = document.getElementById('auctionStartPrice');
const auctionReservePrice = document.getElementById('auctionReservePrice');
const auctionStartDate = document.getElementById('auctionStartDate');
const auctionStartTime = document.getElementById('auctionStartTime');
const auctionEndDate = document.getElementById('auctionEndDate');
const auctionEndTime = document.getElementById('auctionEndTime');

form.addEventListener('input', checkInputs);


function checkInputs() {
	// trim to remove the whitespaces
	const auctionTitleValue = auctionTitle.value.trim();
	const auctionDetailsValue = auctionDetails.value.trim();
	const auctionCategoryValue = auctionCategory.value;
	const auctionConditionValue =auctionCondition.value;
	const auctionStartDateValue =auctionStartDate.value.trim();
	const auctionStartTimeValue =auctionStartTime.value.trim();
	const auctionEndDateValue = auctionEndDate.value.trim();
	const auctionEndTimeValue =auctionEndTime.value.trim();
	const auctionStartPriceValue = auctionStartPrice.value.trim();
	const auctionReservePriceValue =auctionReservePrice.value.trim();
	
	
	if(auctionTitleValue === '') {
		setErrorFor(auctionTitle, 'Title cannot be blank');

	} else {
		setSuccessFor(auctionTitle);
		isValid=True;
	}
	
	if(auctionDetailsValue === '') {
		setErrorFor(auctionDetails, 'Details cannot be blank');

	} else {
		setSuccessFor(auctionDetails);
		isValid=True;
	}
	
	if(auctionCategoryValue === 'none') {
		setErrorFor(auctionCategory, 'Field cannot be blank');

	} else {
		setSuccessFor(auctionCategory);
		isValid=True;
	}

	if(auctionConditionValue ==="none") {
		setErrorFor(auctionCondition, 'Field cannot be blank');

	} else {
		setSuccessFor(auctionCondition);
		isValid=True;
	}

	if(auctionStartDateValue === '') {
		setErrorFor(auctionStartDate, 'Field cannot be blank');

	} else {
		setSuccessFor(auctionStartDate);
		isValid=True;
	}

	if(auctionStartTimeValue === '') {
		setErrorFor(auctionStartTime, 'Field cannot be blank');
		isValid=False;
	} else {
		setSuccessFor(auctionStartTime);
		isValid=True;
	}

	if(auctionEndDateValue === '') {
		setErrorFor(auctionEndDate, 'Field cannot be blank');

	} else {
		setSuccessFor(auctionEndDate);
		isValid=True;
	}

	if(auctionEndTimeValue === '') {
		setErrorFor(auctionEndTime, 'Field cannot be blank');

	} else {
		setSuccessFor(auctionEndTime);
		isValid=True;
	}

	if(auctionStartPriceValue === '') {
		setErrorFor(auctionStartPrice, 'Field cannot be blank');

	} else {
		setSuccessFor(auctionStartPrice);
		isValid=True;
	}

	if(auctionReservePriceValue === '') {
		setErrorFor(auctionReservePrice, 'Field cannot be blank');

	} else {
		setSuccessFor(auctionReservePrice);
		isValid=True;
	}


	}

	

function checkAll() {
	const auctionTitleValue = auctionTitle.value.trim();
	const auctionDetailsValue = auctionDetails.value.trim();
	const auctionCategoryValue = auctionCategory.value;
	const auctionConditionValue =auctionCondition.value;
	const auctionStartDateValue =auctionStartDate.value.trim();
	const auctionStartTimeValue =auctionStartTime.value.trim();
	const auctionEndDateValue = auctionEndDate.value.trim();
	const auctionEndTimeValue =auctionEndTime.value.trim();
	const auctionStartPriceValue = auctionStartPrice.value.trim();
	const auctionReservePriceValue =auctionReservePrice.value.trim();

	if(
		auctionTitleValue === '' ||
		auctionDetailsValue === ''||
		auctionCategoryValue === 'none' ||
		auctionConditionValue === 'none' ||
		auctionStartDateValue === '' ||
		auctionStartTimeValue === '' ||
		auctionEndDateValue === '' ||
		auctionEndTimeValue === '' ||
		auctionStartPriceValue=== '' ||
		auctionReservePriceValue=== '' 
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



	
function fileValidation() {
	var fileInput =
	  document.getElementById('file');
	
	var filePath = fileInput.value;
  
	// Allowing file type
	var allowedExtensions =
		/(\.jpg|\.jpeg|\.png)$/i;
	
	if (!allowedExtensions.exec(filePath)) {
	  alert('Invalid File Type.\nUpload only .jpg/.jpeg/.png files.');
	  fileInput.value = '';
	  return false;
	}
	else
	{
	
	  // Image preview
	  if (fileInput.files && fileInput.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
		  document.getElementById(
			'imagePreview').innerHTML =
			'<img src="' + e.target.result
			+ '"/ height = 80 width = 80>';
		};
		
		reader.readAsDataURL(fileInput.files[0]);
	  }
	}
}	

