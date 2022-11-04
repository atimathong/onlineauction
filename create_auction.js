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
const auctionFile = document.getElementById('file');

form.addEventListener('submit', e => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() {
	// trim to remove the whitespaces
	const auctionFileValue = auctionFile.value;
	const auctionTitleValue = auctionTitle.value.trim();
	const auctionDetailsValue = auctionDetails.value.trim();
	const auctionCategoryValue = auctionCategory.value;
	const auctionConditionValue =auctionCondition.value;
	const auctionStartDateValue =auctionStartDate.value.trim();
	const auctionStartTimeValue =auctionStartTime.value.trim();
	const auctionEndDateValue = auctionEndDate.value.trim();
	const auctionEndTimeValue =auctionEndTime.value.trim();
	const auctionStartPriceValue = auctionStartPrice.value.trim();
	const auctionReservePriceValue =auctionReservePrice.value;

	if(auctionFileValue === '') {
		setErrorFor(auctionFile, 'Please upload a file');
	} else {
		setSuccessFor(auctionFile);
	}

	if(auctionTitleValue === '') {
		setErrorFor(auctionTitle, 'Title cannot be blank');
	} else {
		setSuccessFor(auctionTitle);
	}
	
	if(auctionDetailsValue === '') {
		setErrorFor(auctionDetails, 'Details cannot be blank');
	} else {
		setSuccessFor(auctionDetails);
	}
	
	if(auctionCategoryValue) {
		setErrorFor(auctionCategory, 'Field cannot be blank');
	} else {
		setSuccessFor(auctionCategory);
	}

	if(auctionConditionValue) {
		setErrorFor(auctionCondition, 'Field cannot be blank');
	} else {
		setSuccessFor(auctionCondition);
	}

	if(auctionStartDateValue === '') {
		setErrorFor(auctionStartDate, 'Field cannot be blank');
	} else {
		setSuccessFor(auctionStartDate);
	}

	if(auctionStartTimeValue === '') {
		setErrorFor(auctionStartTime, 'Field cannot be blank');
	} else {
		setSuccessFor(auctionStartTime);
	}

	if(auctionEndDateValue === '') {
		setErrorFor(auctionEndDate, 'Field cannot be blank');
	} else {
		setSuccessFor(auctionEndDate);
	}

	if(auctionEndTimeValue === '') {
		setErrorFor(auctionEndTime, 'Field cannot be blank');
	} else {
		setSuccessFor(auctionEndTime);
	}

	if(auctionStartPriceValue === '') {
		setErrorFor(auctionStartPrice, 'Field cannot be blank');
	} else {
		setSuccessFor(auctionStartPrice);
	}

	if(auctionReservePriceValue === '') {
		setErrorFor(auctionReservePrice, 'Field cannot be blank');
	} else {
		setSuccessFor(auctionReservePrice);
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
	
