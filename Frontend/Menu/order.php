
<?php
include("Components/header.php");
?>

<body>
  <?php
  if(isset($_GET['food_id'])){
    // get the food id and details of the selected food
    $food_id = $_GET['food_id'];

    // get the details
    $query = "SELECT * FROM food WHERE id =$food_id";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if($count==1){
      // get the data from database
      $row = mysqli_fetch_assoc($result);
      $title = $row['title'];
      $price = $row['price'];
      $image_name = $row['image_name'];

    }else{
      // food not available
      header("Location: homepage.php");
    }
  }else{
    // redirect to homepage
    header("Location: homepage.php");
  }
  ?>

<div class="container mt-5">
  <h2 class="text-left mb-4">Food Order</h2>


  <!-- Food Details Section -->
  <form method="post">
  <div class="row">
    <div class="col-md-4">
      <?php
      // check whether the image is available or not
      if($image_name==""){
        // image not available
        echo "<div class='text-danger'>Image Not Available</div>";

      }else{
        // image is available
        ?>
              <img src="../images/food/<?php echo $image_name; ?>"  class="img-fluid" width="150px">
        <?php
      }
      ?>
      <!-- <img src="../images/f2.png" alt="Food Image" class="img-fluid" width="100px"> -->
    </div>
    <div class="col-md-8">
      <h4><?php echo $title; ?></h4>
      <input type="hidden" name="food" value="<?php echo $title; ?>" id="">
      <p>Ksh.<?php echo $price; ?></p>
      <input type="hidden" name="price" value="<?php echo $price; ?>" id="">

    </div>
  </div>

  <!-- Order Form -->
  
    <h4 class="mt-4">Delivery Details</h4>
    <div class="form-group">
      <label for="fullname">Full Name:</label>
      <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter your full name" required>
    </div>
    <div class="form-group">
      <label for="phone">Phone Number:</label>
      <input type="tel" class="form-control" id="phone" name="contact" placeholder="Enter your phone number" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter your address" required></textarea>
    </div>

    <!-- Quantity Selector -->
    <div class="form-group">
      <label for="quantity">Quantity:</label>
      <input type="number" class="form-control" name="quantity" id="quantity" value="1" min="1" required>
    </div>

    <!-- Confirm Order Button -->
    <button type="submit" name="submit" class="btn btn-primary">Confirm Order</button>
  </form>

</div>
<?php
//  check whether submit button is clicked or not
if(isset($_POST['submit'])){
  // get all the details from the form
  $food = $_POST['food'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $total = $price * $quantity;
  $order_date = date("Y-m-d h:i:sa"); //Order Date
  $status = "Ordered"; //Ordered, On Delivery, Delivered, Cancelled
  $customer_name = $_POST['fullname'];
  $customer_contact = $_POST['contact'];
  $customer_email = $_POST['email'];
  $customer_address = $_POST['address'];

  // save the order in database
  $query1 = "INSERT INTO tbl_order SET
  food = '$food',
  price = $price,
  quantity = $quantity,
  total = $total,
  order_date = '$order_date',
  status ='$status',
  customer_name = '$customer_name',
  customer_contact = '$customer_contact',
  customer_email = '$customer_email',
  customer_address = '$customer_address'

  ";

$result1 = mysqli_query($con, $query1);
if($result1==true){
  $_SESSION['order'] = "<div class='text-success text-center'>Food Ordered Successfully</div>";
  header("Location: homepage.php");

}else{
  $_SESSION['order'] = "<div class='text-danger text-center'>Failed to  Order Food</div>";
  header("Location: homepage.php");

}
}
?>

<!-- Bootstrap JS and Popper.js scripts (needed for Bootstrap functionality) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
