<div class='container-fluid text-center pt-2 pb-2 desktopversion'>
    <p class='profiletext' style='font-size:60px;'>Upload</p>
    <div class='container-fluid d-flex justify-content-center pt-2'>
        <form>
            <p class='profiletext'>Song file:</p>
            <input type='file' id='upload' class='profiletext pt-2 pl-5 pb-4' name='fileupload'>
            <div class='row'>
                <div class='col'>
                    <p class='profiletext'>Artist:</p><input type='text' name='artist' id=''>
                </div>
                <div class='col'>
                    <p class='profiletext'>Title:</p><input type='text' name='title' id=''>
                </div>
                <div class='col'>
                    <p class='profiletext'>Album:</p>
                    <select class='albumselection' id='album'>
                        <option value='none'>None</option>

                        <?php
                        $conn = new mysqli("localhost", "admin", "1234", "SoundPi");

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $result = $conn->query("SELECT id,artist,name,year FROM albums");
                        $row = $result->fetch_array(MYSQLI_ASSOC);

                        while ($row != null) {
                            $id = $row["id"];
                            $artist = $row["artist"];
                            $albumname = $row["name"];
                            $year = $row["year"];

                            echo "<option value='$id'>$artist - $albumname [$year]</option>";
                            $row = $result->fetch_array(MYSQLI_ASSOC);
                        }
                        ?>
                        
                    </select>
                </div>
                <div class='col'>
                    <p class='profiletext'>Year:</p><input type='text' name='year' id=''>
                </div>
            </div>
            <br><br>
            <input type='submit' name='submit' value='Upload' id='submit' />
        </form>
    </div>
</div>