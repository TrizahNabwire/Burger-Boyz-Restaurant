<?php
 include("Components/header.php");
?>
  <!-- food section -->

  <?php
  // check whether id is passed or not
  if(isset($_GET['category_id'])){
    $category_id = $_GET['category_id'];

    // get the category title based on category id
    $query1 = "SELECT title FROM category WHERE id=$category_id";
    // execute the query
    $result1 = mysqli_query($con, $query1);
    // get the value from database
    $row1 = mysqli_fetch_assoc($result1);
    // get the title
    $category_title = $row1['title'];
  }else{
    // category not passed
    header("Location: homepage.php");
  }
  ?>

  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".burger">Burger</li>
        <li data-filter=".pizza">Pizza</li>
        <li data-filter=".pasta">Pasta</li>
        <li data-filter=".fries">Fries</li>
      </ul>

      <!-- create query to get based on selected category -->
      <?php
      $query2 = "SELECT * FROM food WHERE category_id=$category_id";
      $result2 = mysqli_query($con, $query2);
      $count2 = mysqli_num_rows($result2);
      if($count2>0){
        // food is available
        while($row2=mysqli_fetch_assoc($result2)){
          $id = $row2['id'];
          $title = $row2['title'];
          $description = $row2['description'];
          $price = $row2['price'];
          $image_name = $row2['image_name'];
          ?>

           <div class="filters-content">
        <div class="row grid">
          <div class="col-sm-6 col-lg-4 all pizza">
            <div class="box">
              <div>
                <div class="img-box">
                  <?php
                  // <!-- <img src="../images/f1.png" alt=""> -->
                  if($image_name==" "){
                    echo "<div class='text-danger'>Image Not Available</div>";
                  }else{
                    ?>

                    <img src="..images/food/ <?php echo $image_name; ?>" alt="">
                    <?php
                  }
                  ?>
                </div>
                <div class="detail-box">
                  <h5>
                    <!-- Delicious Pizza -->
                    <?php echo $title; ?>
                  </h5>
                  <p>
                    <!-- Oven-fresh pizzas—crafted to perfection and designed to satisfy every craving. Taste the essence of deliciousness -->
                    <?php echo $description; ?>
                  </p>
                  <div class="options">
                    <h6>
                      <!-- $20 -->
                      <?php echo $price; ?>
                    </h6>
                    <a href="order.php?food_id=<?php echo $id; ?>">
                      <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                        <g>
                          <g>
                            <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                          </g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</section>

          <?php

        }
      }else{
        // food not available
        echo "<div class='text-danger'>Food Not Available</div>";
      }

      ?>
      <?php 
      //  $query = "SELECT * FROM food WHERE active='Yes'";
      //  $result = mysqli_query($con, $query);
      //  $count = mysqli_num_rows($result);
      //  if($count>0){
        // while($row=mysqli_fetch_assoc($result)){
          // $id = $row['id'];
          // $title = $row['title'];
          // $description = $row['description'];
          // $price = $row['price'];
          // $image_name = $row['image_name'];
          // ?>
          <div class="filters-content">
        <div class="row grid">
          <div class="col-sm-6 col-lg-4 all pizza">
            <div class="box">
              <div>
                <div class="img-box">
                  <?php
                  // <!-- <img src="../images/f1.png" alt=""> -->
                  if($image_name==" "){
                    echo "<div class='text-danger'>Image Not Available</div>";
                  }else{
                    ?>

                    <img src="..images/food/ <?php echo $image_name; ?>" alt="">
                    <?php
                  }
                  ?>
                </div>
                <div class="detail-box">
                  <h5>
                    <!-- Delicious Pizza -->
                    <?php echo $title; ?>
                  </h5>
                  <p>
                    <!-- Oven-fresh pizzas—crafted to perfection and designed to satisfy every craving. Taste the essence of deliciousness -->
                    <?php echo $description; ?>
                  </p>
                  <div class="options">
                    <h6>
                      <!-- $20 -->
                      <?php echo $price; ?>
                    </h6>
                    <a href="order.php?food_id=<?php echo $id; ?>">
                      <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                        <g>
                          <g>
                            <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                          </g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</section>
          <?php
      //   }

      //  }else{
      //   echo "<div class='text-danger text-center'>Food Not Found</div>";

      //  }
      ?>

      
    

  <!-- end food section -->

  <!-- Footer -->
  <?php
    include("Components/footer.php");
  ?>

  