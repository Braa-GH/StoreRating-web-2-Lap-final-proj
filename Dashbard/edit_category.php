<?php
session_start();
if (!isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
    header('Location: login.php');
}

$notification = "";
require_once "DB_Connection.php";
$id =  $_GET['cat_id'];
$oldCategory = $connection->query("select * from category where id = $id")->fetch_assoc();
$old_name = $oldCategory['name'];
$old_desc = $oldCategory['description'];

if (isset($_POST['save'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    if (empty($name)){
        $notification = "<span style='color: red; margin-left: 40%'>Error: categories name cannot be empty!</span>";
    }else{
        if (empty($description)) {
            $description = "No description";
        }
        $update_query = "update category set name = '$name', description = '$description' where id = $id";
        $update_result = mysqli_query($connection, $update_query);
        if ($update_result){
            $notification = "<span style='color: greenyellow; margin-left: 40%'> Category updated successfully ✔</span>";
            header("Location: show_category.php");
        }else{
            $notification = "<span style='color: red; margin-left: 40%'>Error: categories did not update!</span>";
        }
    }

}

if (isset($_POST['cancel'])){
    header("Location: show_category.php");
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
                            <div class="card-title">Edit Category <?php echo $old_name?></div>
                            <hr>
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="input-1">Category Name</label>
                                    <input type="text" name="name" class="form-control" id="input-1" placeholder="Enter category name" value=" <?php echo $old_name?>">
                                </div>
                                <div class="form-group">
                                    <label for="input-2">Description</label>
                                    <textarea class="form-control" name="description" id="input-2" placeholder="Enter category description"> <?php echo $old_desc?> </textarea>
                                    <?php echo $notification; ?>

                                </div>
                                <button type="submit" name="save" class="btn btn-light px-5">Save</button>
                                <button type="submit" name="cancel" class="btn btn-light px-5"> Cancel</button>
                        </div>
                        </form>
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

