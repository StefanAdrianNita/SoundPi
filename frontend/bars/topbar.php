<div class="container-fluid topbar fixed-top">
<div class="container">
    <div class="row">
        <div class="col topbar-btn">
            <?php 
            echo '<a class="topbar-link';
            if($_GET["page"]=="songs") echo " active";
            echo '" href="index.php?page=songs"><i class="fas fa-compact-disc"></i></a>';
            ?>
        </div>
        <div class="col topbar-btn">
        <?php 
            echo '<a class="topbar-link';
            if($_GET["page"]=="about") echo " active";
            echo '" href="index.php?page=about"><i class="fas fa-info"></i></a>';
            ?>
        </div>
        <div class="col topbar-btn">
        <?php 
            echo '<a class="topbar-link';
            if($_GET["page"]=="account") echo " active";
            echo '" href="index.php?page=account"><i class="fas fa-user-alt"></i></a>';
            ?>
        </div>
    </div>
</div>
</div>