
<!DOCTYPE html>
<html lang="en">
<?php
include_once "partial/head.php";
include_once "partial/style.php";
?>



<body class="bg-theme bg-theme1">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

<?php
include_once "partial/side.php";
include_once "partial/header.php";
?>
  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="row mt-3">
          <?php
          include_once "DB_Connection.php";
          $id = isset($_GET['id']) ? $_GET['id'] : 0;
          if ($id == 0){
              $sql = "select * from store";
          }else{
              $sql = "select * from store where category_id = $id";
          }
          $result = $connection->query($sql);
          while ($row = $result->fetch_assoc()){
              $store_id = $row['id'];
              $name = $row['name'];
              $description = $row['description'];
              $address = $row['address'];
              $phone = $row['phone'];
              $rates_number = $row['rates_number'];
              $rate = $row['rate'];
              $logo = $row['logo'];
              if ($rates_number > 0){
                  $store_rate = $rate/ $rates_number;
              }else{
                  $store_rate = 0;
              }

              echo '<div class="col-lg-5">
           <div class="card profile-card-2">
            <div class="card-img-block">
                <img class="img-fluid" src="../Dashbard/uploads/images/'.$logo.'" alt="Card image cap">
            </div>
            <div class="card-body pt-5">
                <h5 class="card-title">'.$name.'</h5>
                <p class="card-text">'.$phone.'</p>
                <p class="card-text">'.$address.'</p>
                <p class="card-text">'.$description. '</p>
            </div>
            <div class="card-body border-top border-light">
                 <div class="media align-items-center">
                     <!-- Review Form -->
                     <div class="col-md-12">
                         <div id="review-form">
                             <form class="review-form" style="font-size: 15px" method="post" action="rate_store.php">
                             Number Of rates:
                             ' .$rates_number.' <br>
                             rate: '.$store_rate.'/5
                             
                                 <div class="input-rating">
                                     <span class="star-size">Your Rating: </span>
                                     <div>
                                         <input type="range" name="rating" max="5" step="1" oninput="this.nextElementSibling.value = this.value">
                                         <output></output>
                                     </div>
                                 </div>
                                 <input type="hidden" name="store_id" value="'.$store_id.'">
                                 <button class="primary-btn" type="submit" name="rate">Rate</button>
                             </form>
                         </div>
                     </div>
                     <!-- /Review Form -->
                 </div>
            </div>
            

    </div>

		  <div class="overlay toggle-menu"></div>
	
    </div>';
          }


          ?>
    <!-- End container-fluid-->
   </div><!--End content-wrapper-->



        <?php
        include_once "partial/footer.php";
        ?>
</body>
</html>
