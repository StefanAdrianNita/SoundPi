<?php
$conn = new mysqli("localhost", "admin", "1234", "SoundPi");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$artist = $_POST["artist"];
$title = $_POST["title"];
$year = $_POST["year"];

$target_dir = "files/album_covers/";

$result = $conn->query("SELECT MAX(id) FROM albums");

$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $id = $row["id"];
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
