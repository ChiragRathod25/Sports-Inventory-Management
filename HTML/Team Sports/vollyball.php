<?php
$server="localhost";
$username="root";
$password="Sports@Inv2937";
$database = "Sports-Inventory-Management";

$connect=mysqli_connect($server,$username,$password,$database);
if(!$connect){
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM category WHERE category.sport_id = 3 ORDER BY category_id";
$category = mysqli_query($connect, $query);

$query="SELECT * FROM product WHERE category_id = category_id ORDER BY product_id";
$products=mysqli_query($connect,$query);

$query="SELECT * FROM brand ORDER BY brand_id ";     
$brands=mysqli_query($connect,$query);

$query = "SELECT * FROM product WHERE product.sport_id = 3 ORDER BY product_id";
$products = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vollyball</title>

    <link rel="stylesheet" href="../../CSS/Home Page/style.css" />
    <link rel="stylesheet" href="../../CSS/Home Page/header-footer.css" />
    <link rel="stylesheet" href="../../CSS/Team Sports/default_team_sports_stylesheet.css"/>
  </head>
  <body>
<my-header></my-header>

    
    <section class="team-sports-result flex-row">
    <div class="left-menu">
      <div class="delivery-day">
        <h3>Delivery Day</h3>
        <ul>
          <li>
            <input type="checkbox" id="today" />
            <label for="today">Today</label>
          </li>
          <li>
            <input type="checkbox" id="tomorrow" />
            <label for="tomorrow">Tomorrow</label>
          </li>
          <li>
            <input type="checkbox" id="next3days" />
            <label for="next3days">Next 3 days</label>
          </li>
          <li>
            <input type="checkbox" id="next7days" />
            <label for="next7days">Next 7 days</label>
          </li>
        </ul>
      </div>
      <hr>
      <div class="category">
        <h3>Category</h3>
        <?php
        if (mysqli_num_rows($category) > 0) {
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($category)) {
                echo "<li>";
                echo "<input type='checkbox' id='" . $row['category_id'] . "' />";
                echo "<label for='" . $row['category_id'] . "'>" . $row['name'] . "</label>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "No categories found.";
        }
        ?>
      </div>
      <hr>
      <div class="customer-review">
        <h3>Customer Review</h3>
        <ul>
          <li>
            <a href="#">
              <span class="material-symbols-outlined">
                star_ratestar_ratestar_ratestar_ratestar_rate
              </span></a>
          </li>
          <li>

            <a href="#">
              <span class="material-symbols-outlined">
                star_ratestar_ratestar_ratestar_rate
              </span></a
            >
          </li>
          <li>
            <a href="#">
              <span class="material-symbols-outlined">
                star_ratestar_ratestar_rate
              </span></a
            >
          </li>
          <li>
            <a href="#">
              <span class="material-symbols-outlined">
                star_ratestar_rate
              </span></a
            >
          </li>

        </ul>
      </div>
      <hr>
      <div class="brands">
        <h3>Brands</h3>
        <?php
        if (mysqli_num_rows($brands) > 0) {
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($brands)) {
                echo "<li>";
                echo "<input type='checkbox' id='" . $row['brand_id'] . "' />";
                echo "<label for='" . $row['brand_id'] . "'>" . $row['name'] . "</label>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "No categories found.";
        }
        ?>
      </div>
      <hr>
      <div class="price">
        <h3>Price</h3>
        <ul>
          <li><a href="#">Under 500</a></li>
          <li><a href="#">500 - 1000</a></li>
          <li><a href="#">1000 - 2000</a></li>
          <li><a href="#">2000 - 5000</a></li>
          <li><a href="#">Above 5000</a></li>
        </ul>
      </div>
    </div>

    <div class="result">
        <div class="breadcrumb">
            <a href="/HTML/">Home</a> > <a href="./">Team Sports</a> > <a href="#">Cricket</a>
          </div>
        <h2>Results</h2>
       <div class="main-container flex-row">

        <!-- <div class="item-container flex-column">
            <img src="../../CSS/Home Page/Cricket/cricket-kit.jpg" alt="">
            <div class="star flex-row">
              <span class="material-symbols-outlined">
              star_rate
            </span><span class="material-symbols-outlined">
              star_rate
            </span><span class="material-symbols-outlined">
              star_rate
            </span>
            <span class="material-symbols-outlined">
              star_rate
            </span>
            <span class="material-symbols-outlined">
              star_rate_half
            </span>
          </div>

          <div class="title-price flex-column">
            <h3>
              Nivia X Cricket Kit pro standard...
            </h3>
            <div>
              &#x20B9 7999
              <del>&#x20B9 10999 </del>
            </div>
          </div>
          <div class="cart-buy flex-column">
            <button type="button">Add to Cart<span class="material-symbols-outlined">
                add_shopping_cart
              </span></button>
            <button type="button">Buy Now</button>
          </div>
        </div> -->
        

        <?php
        
        $query = "SELECT * FROM productimages WHERE product_id IN (SELECT product_id FROM product WHERE sport_id = 1)";
        $image = mysqli_query($connect, $query);

        while ($row = mysqli_fetch_assoc($products)) {
          $row2 = mysqli_fetch_assoc($image);
          echo '<div class="item-container flex-column">';
          echo '<img src="./' . $row2['file_path'] . '" alt="">';
          echo '<div class="star flex-row">';
          echo '<span class="material-symbols-outlined">';
          echo 'star_rate';
          echo '</span><span class="material-symbols-outlined">';
          echo 'star_rate';
          echo '</span><span class="material-symbols-outlined">';
          echo 'star_rate';
          echo '</span>';
          echo '<span class="material-symbols-outlined">';
          echo 'star_rate_half';
          echo '</span>';
          echo '</div>';
          echo '<div class="title-price flex-column">';
          echo '<h3>';
          echo $row['name'];
          echo '</h3>';
          echo '<div>';
          echo '&#x20B9 ' . $row['price'];
          echo '<del>&#x20B9 10000</del>';
          echo '</div>';
          echo '</div>';
          echo '<div class="cart-buy flex-column">';
          echo '<button type="button">Add to Cart<span class="material-symbols-outlined">';
          echo 'add_shopping_cart';
          echo '</span></button>';
          echo '<button type="button">Buy Now</button>';
          echo '</div>';
          echo '</div>';
        }
        ?>
  </div>
    </div>


</section>

  <my-footer></my-footer>
  </body>
  

  <script src="../../JS/headerFooter.js"></script>
  <script src="../../JS/default.js"></script>
  </html>
