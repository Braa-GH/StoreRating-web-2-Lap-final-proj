<?php
session_start();
if (!isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
    header('Location: login.php');
}

    require_once "DB_Connection.php";
    $select_query = "select * from category";
    $selectResult = mysqli_query($connection, $select_query);
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Categories</h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($row = $selectResult->fetch_assoc()){
                                        echo " <tr>
                                        <td>" .$row['name'] . "</td>
                                        <td>" .$row['description'] . "</td>
                                        <td><a href='edit_category.php?cat_id=" . $row['id'] . "' class='btn btn-outline-info mr-1 mb-1'> <b><i class='zmdi zmdi-edit'></i></b> </a></td>
                                        <td>
                                        
                                         <form class = 'c_form' action='delete_category.php' method = 'post'>
                                                    <input type = 'hidden' name = 'cat_id' value = '" . $row['id'] . "'>
                                                <button type='submit' class='btn btn-danger delete_category' id='delete-btn'>
                                                        DELETE
                                                </button>
                                            </form>
                                        
                                        </td>
                                    </tr>";
                                    }

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--End Row-->

        </div>
        <!-- End container-fluid-->

    </div><!--End content-wrapper-->

   <?php
        include_once "partial/footer.php";
   ?>
</body>
</html>
