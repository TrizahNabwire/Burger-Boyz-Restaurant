<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Order </title>
  <!-- Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">Food Order</h2>

  <!-- Food Details Section -->
  <div class="row">
    <div class="col-md-4">
      <img src="../images/f2.png" alt="Food Image" class="img-fluid" width="100px">
    </div>
    <div class="col-md-8">
      <h4>Food Title</h4>
      <p>Price: $10.99</p>
    </div>
  </div>

  <!-- Order Form -->
  <form>
    <h4 class="mt-4">Delivery Details</h4>
    <div class="form-group">
      <label for="fullname">Full Name:</label>
      <input type="text" class="form-control" id="fullname" placeholder="Enter your full name" required>
    </div>
    <div class="form-group">
      <label for="phone">Phone Number:</label>
      <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <textarea class="form-control" id="address" rows="3" placeholder="Enter your address" required></textarea>
    </div>

    <!-- Quantity Selector -->
    <div class="form-group">
      <label for="quantity">Quantity:</label>
      <input type="number" class="form-control" id="quantity" value="1" min="1" required>
    </div>

    <!-- Confirm Order Button -->
    <button type="submit" class="btn btn-primary">Confirm Order</button>
  </form>

</div>

<!-- Bootstrap JS and Popper.js scripts (needed for Bootstrap functionality) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
