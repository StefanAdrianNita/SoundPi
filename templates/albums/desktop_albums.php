<div class='container-fluid text-center pt-2 desktopversion'>
    <p class='profiletext' style='font-size:60px;'>Albums</p>
    <a href="index.php?k=albums&cmd=add" class='profiletext addnewalbum' style='font-size:20px;'>Add new album</a>
    <div class='container-fluid d-flex justify-content-center pt-2'>
        <?php
        $conn = new mysqli("localhost", "admin", "1234", "SoundPi");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query("SELECT * FROM albums");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        ?>

        <table style='width:100%; color:white;' class='table'>
            <tbody>

                <?php
                while ($row != null) {
                    $id = $row["id"];
                    $artist = $row["artist"];
                    $albumname = $row["name"];
                    $year = $row["year"];
                    $img_location = $row["img_location"];

                    echo "
                                    <tr>
                                        <th scope='row' class='align-middle'>$id</th>
                                        <td class='align-middle'><img src='$img_location' alt='Cover$id' style='width:100px;'></td>
                                        <td class='align-middle'>$artist</td>
                                        <td class='align-middle'>$albumname</td>
                                        <td class='align-middle'>$year</td>
                                    </tr>
                            ";
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                }
                ?>
            </tbody>
        </table>

    </div>
</div>