
var successFile = false;

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
        successFile = true;
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

function uploadValidation() {
    if (successFile == false){
        alert("Please upload product image!")
        return false;
		
    }
	
}
