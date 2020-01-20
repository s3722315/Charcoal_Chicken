<?php
  session_start();

  if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  if (isset($_POST['id']))
  {
    $newToCart = array("id"=>$_POST['id'], "option"=>$_POST['option'], "qty"=>(int)$_POST['qty']);
    array_push($_SESSION['cart'], $newToCart);
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c|Montserrat:500" rel="stylesheet">
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' rel="stylesheet" type="text/css" href="css/style.css">
    <?php
    include 'tools.php';
    $productInfo = getFileInfo();
    ?>
    <script src="script.js"></script>
  </head>

  <body>
    <header>
      <div class="wrapper">
        <img class="logo" src="../../media/images.jpg" alt="logo" align='left'>
        <h1>CHARCOAL CHICKEN</h1>
      </div>
    </header>
    <div id="navbar">
      <nav>
        <div class="wrapper">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Menu</a></li>
            <li><a href="#">Contact</a></li>
            <li class="button"><a href="login.php" class="login">Login</a></li>
            <li class="button"><a href="cart.php" class="cart-link"><img class="cart" src="../../media/shopping_cart.png"</img></a></li>
          </ul>
        </div>
      </nav>
    </div>
    <script>
      window.onscroll = function() {myFunction()};

      var navbar = document.getElementById("navbar");
      var sticky = navbar.offsetTop;

      function myFunction() {
        if (window.pageYOffset >= sticky) {
          navbar.classList.add("sticky")
        } else {
          navbar.classList.remove("sticky");
        }
      }
    </script>
    <main>
      <div class="cart-page">
        <div class="wrapper">
          <?php
          foreach ($_SESSION['cart'] as $item) {
            echo "<div class='cart-object'>\n\t";
            echo "<img class='cart-item-img' src='../../media/";
            echo $item['id'];
            echo ".jpg' alt='cart item image' id='cart-item-img'>\n\t";
            echo "<div class='cart-info'>\n\t";
            echo "<h3>";
            echo getItemInfo($item['id'], $productInfo, $item['option'])['Option'];
            echo " ";
            echo getItemInfo($item['id'], $productInfo, $item['option'])['Title'];
            echo "</h3>\n\t";
            echo "<h4>Quantity: ";
            echo $item['qty'];
            echo" </h4>\n\t";
            echo "<h4>Price: $";
            echo "<script type='text/javascript'>\n\t";
            echo "var price = ";
            echo getItemInfo($item['id'], $productInfo, $item['option'])['Price'];
            echo ";\n\t";
            echo "var qty = ";
            echo $item['qty'];
            echo ";\n\t";
            echo "price = price*qty;\n\t";
            echo "document.write(price.toFixed(2));\n";
            echo "</script>\n";
            echo" </h4>\n\t";
            echo "</div>\n";
            echo "</div>";
          }
          ?>
          <h3>Total Price: $
            <script type="text/javascript">
              <?php
                $subTotal = 0;
                foreach ($_SESSION['cart'] as $item) {
                  $price = getItemInfo($item['id'], $productInfo, $item['option'])['Price'];
                  $qty = $item['qty'];
                  $price = $price * $qty;
                  $subTotal += $price;
                }
              ?>
              var subTotal = <?php echo $subTotal ?>;
              document.write(subTotal.toFixed(2));
            </script>
          </h3>
          <div class="button-grid">
            <form method="post" action="/products.php">
              <input type="submit" name="cancel" value="Cancel Cart">
            </form>

            <button type="button" name="checkoutPage"><a href="checkout.php">Check Out</a></button>
          </div>
        </div>
      </div>
    </main>


    <footer>
      <div class="content">

        <div class="wrapper">
          <div class="footer-grid">
            <div class="grid-item">
              <h3>LOCATION</h3>
              <p>Shop 61,Endeavour Hills</p>
              <p>Shopping Centre,</p>
              <p>Corner Matthew Flinders</p>
              <p>Ave & Heatherton Road,</p>
              <p>Endeavour Hills VIC 3802</p>
            </div>
            <div class="grid-item">
              <h3> OPENING HOURS </h3>
              <p>Sun: 11:30am-12:30am</p>
              <p>Mon: 10:30am-9:30pm</p>
              <p>Tue: 10:30am-9:30pm</p>
              <p>Wed: Closed</p>
              <p>Thu: 1:30pm-7:30pm</p>
              <p>Fri: 1:30pm-7:30pm</p>
              <p>Sat: 11:30am-12:30am</p>
            </div>
          </div>
        </div>
      </div>
        <div class="wrapper">
          <h5 class="text-file">  &copy;
           <script>
             document.write(new Date().getFullYear());
           </script>
           Andy Pham, s3722315 A2-s3721278-s3722315. Link to the
           <a class="text-file" href="product.txt">products</a> and <a class="text-file" href="orders.txt">orders</a></h5>
           <h5>Disclaimer: This website is not a real website and is being developed
            as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</h5>

        </div>
        <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>

    </footer>
  </body>
</html>
<?php
include("/home/eh1/e54061/public_html/wp/debug.php");
?>
