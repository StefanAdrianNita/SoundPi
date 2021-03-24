<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoundPi</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom.css" type="text/css" />
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

                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password1"];
                $password = md5($password);

                $result = $conn->query("INSERT INTO users (username,passwd,email) VALUES ('$username','$password','$email')");
                if ($result == false) {
                    echo "<p class='profiletext' style='color: red; font-size:30px;'>This username already exists.</p>";
                    echo "
                        <p class='profiletext'>If you already have an account. Go to Login.</p>
                        <a href='index.php?k=profile' class='loginbtn'>Go back</a>
                        ";
                } else {
                    echo "
                        <p class='profiletext'>You registered successfully. Now go back and login in your account.</p>
                        <a href='index.php?k=profile' class='loginbtn'>Go back</a>
                    ";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <div class="container-fluid d-flex justify-content-between fixed-bottom bottombar">
        <div class="bottombar-btn pt-2 pb-2 pl-2 pr-2">
            <a href="index.php?k=songs" class="btn-link">My Songs</a>
        </div>
        <div class="bottombar-btn pt-2 pb-2 pl-2 pr-2">
            <a href="index.php?k=albums" class="btn-link">Albums</a>
        </div>
        <div class="bottombar-btn pt-2 pb-2 pl-2 pr-2">
            <a href="index.php?k=Upload" class="btn-link">Upload</a>
        </div>
        <div class="bottombar-btn pt-2 pb-2 pl-2 pr-2">
            <a href="index.php?k=profile" class="btn-link">Profile</a>
        </div>
    </div>
</body>

</html>