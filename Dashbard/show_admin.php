<?php
session_start();
if (!isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
    header('Location: login.php');
}

$notification = "";
require_once "DB_Connection.php";
$sql = "select * from admin";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php
include_once "partial/head.php";
?>

<body class="bg-theme bg-theme1">

<!-- Start wrapper-->
<div id="wrapper">

    <?php
    include_once "partial/side.php";
    ?>


    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="content-wrapper">
            <?php
                while ($row = $result->fetch_assoc()){
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $address = $row['address'];
                    $description = $row['description'];
                    $status = $row['status'];
                    if ($status == 1){
                        $statusInfo = '<span style="color: greenyellow">active</span>';
                    }else{
                        $statusInfo = '<span style="color: red">disabled</span>';
                    }

                    echo '            <div class="container-fluid">

                <div class="row mt-3">

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                    <li class="nav-item">
                                        <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                                    </li>
                                </ul>
                                <div class="tab-content p-3">
                                    <div class="tab-pane active" id="profile">
                                        <h5 class="mb-3">'.$name.'</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6>Admin Info</h6>
                                                <p>
                                                    Email: '.$email.'<br>
                                                    Phone: '.$phone.'<br>
                                                    Address: '.$address.'<br>
                                                    Status: '.$statusInfo.'
                                                </p>
                                                <h6>Description: </h6>
                                                <p>
                                                    '.$description.'
                                                </p>
                                            </div>
                                        </div>
                                         <div class="col-lg-9">
                                        <form class = "c_form" action="delete_admin.php" method = "post">
                                                    <a href="edit_profile.php?id='. $row['id'] . ' " class="btn btn-outline-info mr-1 mb-1"> <b><i class="zmdi zmdi-edit"></i></b> </a>        

                                                    <input type = "hidden" name = "id" value = "' . $row['id'] . '">
                                                <button type="submit" class="btn btn-danger delete_category" id="delete-btn">DELETE</button>
                                            </form>
                                        </div>
                                        <!--/row-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->

            </div>
';
                }
            ?>
            <!-- End container-fluid-->
        </div><!--End content-wrapper-->

    </div><!--End wrapper-->


    <?php
    include_once "partial/footer.php";
    ?>
</body>
</html>