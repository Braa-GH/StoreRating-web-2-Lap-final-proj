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
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    if (empty($name)){
        $notification = "<span style='color: red; margin-left: 40%'>Error: Store name cannot be empty!</span>";
    }else{
        if (empty($description)){
            $description = "No description";
        }

        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];
        $file_temp_name = $_FILES['image']['tmp_name'];

        $file_ext = pathinfo($file_name , PATHINFO_EXTENSION);
        $file_new_name = $file_name . time() . rand(1,10000) .".$file_ext";
        $upload_path = "uploads/images/$file_new_name";
        move_uploaded_file($file_temp_name, $upload_path);


        $insert_query = "insert into store(name,address, phone,description, rates_number, rate, category_id, logo) values ('$name', '$address', '$phone', '$description', 0, 0, $category_id, '$file_new_name')";
        $insert_result = mysqli_query($connection, $insert_query);
        if ($insert_query){
            $notification = "<span style='color: greenyellow; margin-left: 40%'> Store inserted successfully ✔</span>";
        }else{
            $notification = "<span style='color: red; margin-left: 40%'>Error: store did not added!</span>";
            header("Location: add_store.php");
        }
    }

}

if (isset($_POST['cancel'])){
    header("Location: show_store.php");
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
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Add New Store</div>
                            <hr>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="input-1">Store Name</label>
                                    <input type="text" name="name" class="form-control" id="input-1"">
                                </div>
                                <div class="form-group">
                                    <label for="input-1">Address</label>
                                    <input type="text" name="address" class="form-control" id="input-1"">
                                </div>
                                <div class="form-group">
                                    <label for="input-1">Phone</label>
                                    <input type="tel" name="phone" class="form-control" id="input-1"">
                                </div>

                                <div class="form-group">
                                    <label for="input-1">Logo</label>
                                    <input type="file" name="image" class="form-control" id="input-1"">
                                </div>

                                <div class="form-group">
                                    <label for="input-1">Category</label>
                                    <select class="form-control"  name="category_id">
                                        <?php
                                        include 'DB_CONNECTION.php';
                                        $query="SELECT * from category";
                                        $result=mysqli_query($connection,$query);
                                        while($row=mysqli_fetch_assoc($result)){
                                            echo '<option value="'.$row['id'].'">' .$row['name']. '</option>';
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="input-2">Description</label>
                                    <textarea class="form-control" name="description" id="input-2" placeholder=""></textarea>
                                    <?php echo $notification; ?>

                                </div>
                                <button type="submit" name="add" class="btn btn-light px-5"> Add Store</button>
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
