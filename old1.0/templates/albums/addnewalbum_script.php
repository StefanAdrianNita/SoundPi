<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoundPi</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../custom.css" type="text/css" />
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <div class="container-fluid titlebar pt-1 text-center">
        <p class="titlebar-title">SoundPi</p>
    </div>

    <div class='container-fluid d-flex'>
        <div class='container align-self-center pt-5 text-center'>
            <div class='container align-self-center'>

<?php
$conn = new mysqli("localhost", "admin", "1234", "SoundPi");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$artist = $_POST["artist"];
$title = $_POST["title"];
$year = $_POST["year"];

$target_dir = "./files/album_covers/";

$result = $conn->query("SELECT MAX(id) FROM albums");

$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
    $id = $row["id"];
}
$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
$fileName = $_FILES['uploadedFile']['name'];
$fileSize = $_FILES['uploadedFile']['size'];
$fileType = $_FILES['uploadedFile']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$uploadFileDir = $target_dir;
$dest_path = $uploadFileDir . $id . $fileExtension;

if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='File is successfully uploaded.';
      }

$result = $conn->query("INSERT INTO albums (artist,name,year,img_location) VALUES ('$artist','$title','$year','$dest_path')");

echo $message;

echo "
        <p class='profiletext'>Album created!</p>
        <a href='../../index.php?k=albums' class='loginbtn'>Go to Albums</a>
    ";
    ?>
</div>
        </div>
    </div>

    <div class="container-fluid d-flex justify-content-between fixed-bottom bottombar">
        <div class="bottombar-btn pt-2 pb-2 pl-2 pr-2">
            <a href="../index.php?k=songs" class="btn-link">My Songs</a>
        </div>
        <div class="bottombar-btn pt-2 pb-2 pl-2 pr-2">
            <a href="../index.php?k=albums" class="btn-link">Albums</a>
        </div>
        <div class="bottombar-btn pt-2 pb-2 pl-2 pr-2">
            <a href="../index.php?k=Upload" class="btn-link">Upload</a>
        </div>
        <div class="bottombar-btn pt-2 pb-2 pl-2 pr-2">
            <a href="../index.php?k=profile" class="btn-link">Profile</a>
        </div>
    </div>
</body>

</html>