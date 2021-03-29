    <?php
    session_start();
    include 'templates/head_header.php';

    if (!isset($_GET)) {
    } else {

        if ($_GET["k"] == "profile") {

            if (!isset($_SESSION["username"])) {

                if (!isset($_GET["cmd"])) {
                    include 'templates/login_register.html';
                }

                if ($_GET["cmd"] == "register") {
                    include 'templates/register.html';
                }

                if ($_GET["cmd"] == "login") {
                    include 'templates/login.php';
                }
            } else {
                include 'templates/profile/desktop_profile.php';
                include 'templates/profile/mobile_profile.php';
            }
        }

        if (!isset($_SESSION["username"])) {
            if ($_GET["k"] == "upload") {
                include 'templates/login_register.html';
            }
            if ($_GET["k"] == "albums") {
                include 'templates/login_register.html';
            }
            if ($_GET["k"] == "songs") {
                include 'templates/login_register.html';
            }
        } else {
            if ($_GET["k"] == "upload") {
                include 'templates/upload/desktop_upload.php';
            }
            if ($_GET["k"] == "albums") {
                if ($_GET["cmd"] == "add") {
                    include 'templates/albums/desktop_addalbums.php';
                } else {
                    include 'templates/albums/desktop_albums.php';
                }
            }
            if ($_GET["k"] == "songs") {
            }
        }
    }
    include 'templates/mediaplayer.html';
    include 'templates/bottombar.html';
    ?>