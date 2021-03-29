<div class='container-fluid text-center pt-2 pb-2 desktopversion'>
    <p class='profiletext' style='font-size:60px;'>Add New Album</p>
    <div class='container-fluid d-flex justify-content-center pt-2'>
        <form action="templates/albums/addnewalbum_script.php" method="post">
            <p class='profiletext'>Cover file:</p>
            <input type='file' id='upload' class='profiletext pt-2 pl-5 pb-4' accept="image/x-png,image/jpeg" name='fileupload'>
            <div class='row'>
                <div class='col'>
                    <p class='profiletext'>Artist:</p><input type='text' name='artist' id=''>
                </div>
                <div class='col'>
                    <p class='profiletext'>Title:</p><input type='text' name='title' id=''>
                </div>
                <div class='col'>
                    <p class='profiletext'>Year:</p><input type='text' name='year' id=''>
                </div>
            </div>
            <br><br>
            <input type='submit' name='submit' value='Add Album' id='submit' />
        </form>
    </div>
</div>