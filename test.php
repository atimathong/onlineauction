

<!DOCTYPE html>
<html lang="en">

<?php
    if(isset($_POST["img_submit"])) {
    

        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $folder = 'uploads/';
        move_uploaded_file($fileTmpName, $folder.$fileName);
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="img_upload.php" method="POST" enctype="multipart/form-data">
        Select image to upload:
      <input type="file" name="file"><br><br>
      <button type="submit" name="img_submit">UPLOAD</button>
      <small id="pictureHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Upload only .jpg or .jpeg files.</small>
    </form>
</body>
</html>


