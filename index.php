<?php
session_start();
?>


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

    <?php
    //IF GET IS EMPTY (SHOW HOMEPAGE)
    if (!isset($_GET)) {
        //WORK IN PROGRESS
    } else {
        //IF USER CLICKS PROFILE(SHOW PROFILE PAGE)
        if ($_GET["k"] == "profile") {
            //IF THERE ISN'T ANY SESSIONS
            if (!isset($_SESSION["username"])) {
                //IF NO CMD IS CHOOSED SHOW LOGIN/REGISTER PAGE
                if (!isset($_GET["cmd"])) {
                    echo "
                    <div class='container-fluid d-flex'>
                        <div class='container align-self-center pt-5 text-center'>
                            <div class='container align-self-center'>
                                <p class='profiletext'>If you already have an account login here.</p>
                                <a href='index.php?k=profile&cmd=login' class='loginbtn'>Login</a>
                                <br><br>
                                <p class='profiletext'>If not create your account here.</p>
                                <a href='index.php?k=profile&cmd=register' class='loginbtn'>Register</a>
                            </div>
                        </div>
                    </div>
                    ";
                }
                //IF USER CHOOSED REGISTER
                if ($_GET["cmd"] == "register") {
                    echo "

                        <script>
                            function check_pass(){
                                console.log(document.getElementById('pswd1').value);
                                console.log(document.getElementById('pswd2').value);

                                if((document.getElementById('pswd1').value == document.getElementById('pswd2').value) && (document.getElementById('username').value != '' && document.getElementById('email').value != '')){
                                    document.getElementById('pswd1').style.border = '2px solid #232323';
                                    document.getElementById('pswd2').style.border = '2px solid #232323';
                                    document.getElementById('submit').disabled = false;
                                    document.getElementById('differentpass').style.visibility = 'hidden';
                                }
                                else{
                                    document.getElementById('pswd1').style.border = '2px solid red';
                                    document.getElementById('pswd2').style.border = '2px solid red';
                                    document.getElementById('submit').disabled = true;
                                    differentpass.innerHTML = 'The passwords are not the same or the form is incomplete. Try again.';
                                    document.getElementById('differentpass').style.visibility = 'visible';
                                }

                                if(document.getElementById('pswd1').value == '' || document.getElementById('pswd2').value == ''){
                                    document.getElementById('pswd1').style.border = '2px solid red';
                                    document.getElementById('pswd2').style.border = '2px solid red';
                                    document.getElementById('submit').disabled = true;
                                    document.getElementById('differentpass').style.visibility = 'visible';
                                    differentpass.innerHTML = 'The passwords are empty.';
                                }
                            }
                        </script>

                        <div class='container-fluid d-flex'>
                        <div class='container align-self-center pt-5 text-center'>
                            <div class='container align-self-center'>
                            <p class='profiletext' style='font-size:40px;'>Registration</p>
                                <form action='user/register.php' method='post'>
                                    <p class='profiletext'>Username</p>
                                    <input type='text' name='username' id='username' onchange='check_pass();'>
                                    <br><br>
                                    <p class='profiletext'>Email</p>
                                    <input type='text' name='email' id='email' onchange='check_pass();'>
                                    <br><br>
                                    <p class='profiletext'>Password</p>
                                    <input type='password' name='password1' id='pswd1' onchange='check_pass();'>
                                    <br><br>
                                    <p class='profiletext'>Re-enter Password</p>
                                    <input type='password' name='password2' id='pswd2' onchange='check_pass();'>
                                    <br>
                                    <p class='profiletext' style='color: red; display:block;' id='differentpass'></p>
                                    <input type='submit' name='submit' value='Confirm'  id='submit' disabled/>
                                    <br>
                                    <br>
                                    <p>.</p>
                                </form>
                            </div>
                        </div>
                    </div>
                        ";
                }
                //IF USER CHOOSED LOGIN
                if ($_GET["cmd"] == "login") {
                    echo "
                    <div class='container-fluid d-flex'>
                    <div class='container align-self-center pt-5 text-center'>
                        <div class='container align-self-center'>
                        <p class='profiletext' style='font-size:40px;'>Login</p>
                            <form action='user/login.php' method='post'>
                                <p class='profiletext'>Username</p>
                                <input type='text' name='username' id=''>
                                <br><br>
                            
                                <p class='profiletext'>Password</p>
                                <input type='password' name='password' id='pswd' placeholder=''>
                                <br><br>
                            
                                <p class='profiletext' style='color: red; display:block;' id='error'>";
                    if ($_GET["error"] == "y") {
                        echo "Error. Try Again.";
                    }
                    echo "
                                </p>
                                <input type='submit' name='submit'  value='Confirm' id='submit'/>
                                <br>
                                <br>
                                <p>.</p>
                            </form>
                        </div>
                    </div>
                </div>
                    ";
                }
            } else {
                echo "
                    <div class='container-fluid desktopversion'>
                        <div class='container-fluid d-flex justify-content-between pt-2' style='border-bottom: 2px solid #232323;'>
                            <p class='profiletext' style='font-size:40px;'>Welcome, " . $_SESSION["username"] . "!</p>
                            <a href='user/logout.php' class='btn-link pt-2'>Logout</a>
                        </div>
                    </div>
                    ";


                echo "
                    <div class='container-fluid mobileversion'>
                        <div class='container-fluid text-center pt-2' style='border-bottom: 2px solid #232323;'>
                            <p class='profiletext' style='font-size:35px;'>Welcome, " . $_SESSION["username"] . "!</p>
                            <a href='user/logout.php' class='btn-link'>Logout</a>
                            <br>
                        </div>
                    </div>
                    ";
            }
        }
        //IF USER GOES TO UPLOAD (SHOW UPLOAD PAGE)
        if ($_GET["k"] == "upload") {
            echo "
                    <div class='container-fluid text-center pt-2 pb-2 desktopversion'>
                        <p class='profiletext' style='font-size:60px;'>Upload</p>
                        <div class='container-fluid d-flex justify-content-center pt-2'>
                            <form>
                                <p class='profiletext'>Song file:</p>
                                <input type='file' id='upload' class='profiletext pt-2 pl-5 pb-4' name='fileupload'>
                                <div class='row'>
                                    <div class='col'><p class='profiletext'>Artist:</p><input type='text' name='artist' id=''></div>
                                    <div class='col'><p class='profiletext'>Title:</p><input type='text' name='title' id=''></div>
                                    <div class='col'>
                                    <p class='profiletext'>Album:</p>
                                        <select class='albumselection' id='album'>
                                            <option value='none'>None</option>
                                            ";

            $conn = new mysqli("localhost", "admin", "1234", "SoundPi");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = $conn->query("SELECT id,artist,name,year FROM albums");
            $row = $result -> fetch_array(MYSQLI_ASSOC);

            while($row != null){
                $id = $row["id"];
                $artist = $row["artist"];
                $albumname = $row["name"];
                $year = $row["year"];

                echo "<option value='$id'>$artist - $albumname [$year]</option>";
                $row = $result -> fetch_array(MYSQLI_ASSOC);
            }

            echo "
                                        </select>
                                    </div>
                                    <div class='col'><p class='profiletext'>Year:</p><input type='text' name='year' id=''></div>
                                </div>
                                <br><br>
                                <input type='submit' name='submit' value='Upload' id='submit'/>
                            </form>
                        </div>
                    </div>
                    ";


            echo "
                    <div class='container-fluid mobileversion'>
                        <div class='container-fluid text-center pt-2'>
                            
                        </div>
                    </div>
                    ";
        }
        if ($_GET["k"] == "albums"){

        }
    }
    ?>
    <!-- BOTTOM BAR (SONGS ALBUMS UPLOAD PROFILE)-->
    <div class="container-fluid d-flex justify-content-around fixed-bottom bottombar">
        <div class="bottombar-btn pt-2 pb-2 pl-2 pr-2">
            <a href="index.php?k=songs" class="btn-link">Songs</a>
        </div>
        <div class="bottombar-btn pt-2 pb-2 pl-2 pr-2">
            <a href="index.php?k=albums" class="btn-link">Albums</a>
        </div>
        <div class="bottombar-btn pt-2 pb-2 pl-2 pr-2">
            <a href="index.php?k=upload" class="btn-link">Upload</a>
        </div>
        <div class="bottombar-btn pt-2 pb-2 pl-2 pr-2">
            <a href="index.php?k=profile" class="btn-link">Profile</a>
        </div>
    </div>
</body>

</html>