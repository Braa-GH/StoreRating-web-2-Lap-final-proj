
<?php
include_once "DB_Connection.php";
$sql = "select * from category";
$result = $connection->query($sql);
?>

<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="profile.php">
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Public Website</h5>
        </a>
    </div>

    <ul class="sidebar-menu do-nicescrol">

        <li class="sidebar-header">
            <i class="zmdi zmdi-view-dashboard"></i>
            <span>Categories</span>
        </li>



        <?php
            while ($row = $result->fetch_assoc()){
                $id = $row['id'];
                $name = $row['name'];

                echo ' <li>
            <a href="profile.php?id='.$id.'">
                <i class="zmdi zmdi-accounts"></i> <span>'.$name.'</span>
            </a>
        </li>';
            }
        ?>

        <li>
            <hr>
            <a href="profile.php">
                <i class="zmdi zmdi-accounts"></i> <span>All Stores</span>
            </a>
        </li>

    </ul>

</div>
<!--End sidebar-wrapper-->