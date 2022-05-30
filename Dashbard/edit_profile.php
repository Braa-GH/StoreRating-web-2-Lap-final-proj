
<?php
session_start();
if (!isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
    header('Location: login.php');
}


    $notification = "";
    $id = $_GET['id'];
    require_once "DB_Connection.php";
    $sql = "select * from admin where id = $id";
    $result = $connection->query($sql)->fetch_assoc();
    $id = $result['id'];
    $name0 = $result['name'];
    $email0 = $result['email'];
    $phone0 = $result['phone'];
    $address0 = $result['address'];
    $description0 = $result['description'];
    $status0 = $result['status'];


    if (isset($_POST['save'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $description = $_POST['description'];
        $status = 0;
        if (isset($_POST['status'])){
            $status = $_POST['status'];
        }

        if ($status == 0){
            if ($_SESSION['id'] == $id){
                $notification = "<span style='color: white; margin-left: 40%; background-color: red'>You cannot disable yourself!</span>";
            }else{
                if (empty($name)){
                    $notification = "<span style='color: white; margin-left: 40%; background-color: red'>Error: Name cannot be empty!</span>";
                }elseif (empty($email)){
                    $notification = "<span style='color: white; margin-left: 40%; background-color: red'>Error: email cannot be empty!</span>";

                }elseif (empty($phone)){
                    $notification = "<span style='color: white; margin-left: 40%; background-color: red'>Error: phone cannot be empty!</span>";

                }elseif (empty($address)){
                    $notification = "<span style='color: white; margin-left: 40%; background-color: red'>Error: address cannot be empty!</span>";

                }else{
                    if (empty($description)){
                        $description = "No Description";
                    }
                    $sql = "update admin set name = '$name', email = '$email', phone = '$phone', address = '$address', description = '$description', `status` = $status where id = $id;";
                    if ($connection->query($sql)){
                        $notification = "<span style='color: greenyellow; margin-left: 40%'>Admin $name has been updated successfully</span>";
                        header("Location: show_admin.php");
                    }else{
                        $notification = "<span style='color: red; margin-left: 40%'>Error: Admin failed to be updated</span>";
                    }

                }
            }
        }else{
            if (empty($name)){
                $notification = "<span style='color: white; margin-left: 40%; background-color: red'>Error: Name cannot be empty!</span>";
            }elseif (empty($email)){
                $notification = "<span style='color: white; margin-left: 40%; background-color: red'>Error: email cannot be empty!</span>";

            }elseif (empty($phone)){
                $notification = "<span style='color: white; margin-left: 40%; background-color: red'>Error: phone cannot be empty!</span>";

            }elseif (empty($address)){
                $notification = "<span style='color: white; margin-left: 40%; background-color: red'>Error: address cannot be empty!</span>";

            }else{
                if (empty($description)){
                    $description = "No Description";
                }
                $sql = "update admin set name = '$name', email = '$email', phone = '$phone', address = '$address', description = '$description', `status` = $status where id = $id;";
                if ($connection->query($sql)){
                    $notification = "<span style='color: greenyellow; margin-left: 40%'>Admin $name has been updated successfully</span>";
                    header("Location: show_admin.php");
                }else{
                    $notification = "<span style='color: red; margin-left: 40%'>Error: Admin failed to be updated</span>";
                }

            }
        }




    }

    if (isset($_POST['cancel'])){
        header("Location: show_admin.php");
    }



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
        include_once "partial/header.php";
        ?>

        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row mt-3">

                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                    <li class="nav-item">
                                        <a data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                                    </li>
                                </ul>
                                <br>
                                <div class="tab-pane" id="edit">
                                    <form method="post" action="">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="text" name="name" value="<?php echo $name0 ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="email" name="email" value="<?php echo $email0 ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                                            <div class="col-lg-9">
                                                <input name="phone" class="form-control" value="<?php echo $phone0 ?>" type="tel">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="address" value="<?php echo $address0 ?>" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Description</label>
                                            <div class="col-lg-9">
                                                <textarea name="description" class="form-control"><?php echo $description0 ?></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Status</label>
                                            <div class="col-lg-1">
                                                <input class="form-control" name="status" type="checkbox" value="1" <?php if ($status0 == 1){echo "checked";} ?> >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label"></label>
                                            <div class="col-lg-9">
                                                <input type="submit" name="save" class="btn btn-primary" value="Save">
                                                <button  name="cancel" class="btn btn-secondary" >Cancel</button>
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

