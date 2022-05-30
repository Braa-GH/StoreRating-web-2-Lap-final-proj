<?php
session_start();
if (!isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
    header('Location: login.php');
}
?>


<?php
require_once "DB_Connection.php";
$notification = "";

if (isset($_POST['add'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $password = md5($_POST['password']);
    $status = 0;
    if (isset($_POST['status'])){
        $status = $_POST['status'];
    }

    if (empty($name)){
        $notification = "<span style='color: red; margin-left: 40%'>Error: Name cannot be empty!</span>";
    }elseif (empty($email)){
        $notification = "<span style='color: red; margin-left: 40%'>Error: email cannot be empty!</span>";

    }elseif (empty($phone)){
        $notification = "<span style='color: red; margin-left: 40%'>Error: phone cannot be empty!</span>";

    }elseif (empty($address)){
        $notification = "<span style='color: red; margin-left: 40%'>Error: address cannot be empty!</span>";

    }elseif (empty($password)){
        $notification = "<span style='color: red; margin-left: 40%'>Error: password cannot be empty!</span>";

    }else{
        if (empty($description)){
            $description = "No Description";
        }
        $sql = "insert into admin (name, email, phone, password, address, description, `status`) values ('$name', '$email', '$phone', '$password', '$address', '$description', '$status')";
        if ($connection->query($sql)){
            $notification = "<span style='color: greenyellow; margin-left: 40%'>Admin $name has been added successfully</span>";
        }else{
            $notification = "<span style='color: red; margin-left: 40%'>Error: Admin failed to be added</span>";
        }

    }


}

?>


<!DOCTYPE html>
<?php
include_once "partial/head.php";
?>

<body class="bg-theme bg-theme1">


<!-- Start wrapper-->
<div id="wrapper">

    <?php
    include_once "partial/side.php";
    include_once "partial/header.php";
    ?>

    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row mt-3">

                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                <li class="nav-item">
                                    <a data-toggle="pill" class="nav-link"><i class="icon-user"></i> <span class="hidden-xs">Add new Admin</span></a>
                                </li>
                            </ul>
                            <br>
                            <div class="tab-pane">
                                <form method="post" action="">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                                        <div class="col-lg-9">
                                            <input name="phone" class="form-control" type="tel">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="address" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Description</label>
                                        <div class="col-lg-9">
                                            <textarea name="description" class="form-control"></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="password" type="password" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Status</label>
                                        <div class="col-lg-1">
                                            <input class="form-control" name="status" type="checkbox" value="1">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input type="submit" name="add" class="btn btn-primary" value="Add admin">
                                        </div>
                                    </div>
                                </form>
                                <?php echo $notification; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->

        </div>
        <!-- End container-fluid-->
    </div><!--End content-wrapper-->
    <?php
    include_once "partial/footer.php";
    ?>
</body>
</html>
