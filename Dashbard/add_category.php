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
    $description = $_POST['description'];
    if (empty($name)){
        $notification = "<span style='color: red; margin-left: 40%'>Error: categories name cannot be empty!</span>";
    }else{
        if (empty($description)){
            $description = "No description";
        }
        $insert_query = "insert into category(name, description) values ('$name', '$description')";
        $insert_result = mysqli_query($connection, $insert_query);
        if ($insert_query){
            $notification = "<span style='color: greenyellow; margin-left: 40%'> Category inserted successfully ✔</span>";
        }else{
            $notification = "<span style='color: red; margin-left: 40%'>Error: categories did not add!</span>";
            header("Location: add_category.php");
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
                            <div class="card-title">Add New Category</div>
                            <hr>
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="input-1">Category Name</label>
                                    <input type="text" name="name" class="form-control" id="input-1" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="input-2">Description</label>
                                    <textarea class="form-control" name="description" id="input-2" placeholder="Enter category description"></textarea>
                                    <?php echo $notification; ?>

                                </div>
                                <button type="submit" name="add" class="btn btn-light px-5"> Add category</button>
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
