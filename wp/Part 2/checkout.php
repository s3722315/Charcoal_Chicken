<?php
 $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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
      <div class="checkout">
        <div class="wrapper">
          <form class="user-info" action="reciept.php" method="post">
            <div class="an-input">
              <div class="input">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Enter your name">
              </div>
              <?php
              if (strpos($fullUrl, "name=wrong") == true) {
                echo "<p class='errorMessage'>Please enter only letter, (,), (-), (.) and ('). </p>";
              }
              ?>
            </div>
            <div class="an-input">
              <div class="input">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter your Email"><br>
              </div>
              <?php
              if (strpos($fullUrl, "email=empty") == true) {
                echo "<p class='errorMessage'>Please enter an email.</p>";
              }
              ?>
            </div>
            <div class="an-input">
              <div class="input">
                <label for="address">Street Address:</label>
                <textarea name="address" id="address" rows="5" cols="80" placeholder="Enter your address"></textarea>
              </div>
              <?php
              if (strpos($fullUrl, "address=wrong") == true) {
                echo "<p class='errorMessage'>Please enter your address.</p>";
              }
              ?>
            </div>
            <div class="an-input">
              <div class="input">
                <label for="mobile">Mobile phone:</label>
                <input type="text" name="mobile" id="mobile" placeholder="04 #### ####">
              </div>
              <?php
              if (strpos($fullUrl, "mobile=wrong") == true) {
                echo "<p class='errorMessage'>Please enter your mobile number like this:<br>0412345678 or<br>04 1234 5678 or<br>(04) 1234 5678 or <br> +614 1234 5678</p>";
              }
              ?>
            </div>
            <div class="an-input">
              <div class="input">
                <label for="creditCard">Credit Card:</label>
                <input type="text" name="creditCard" id="creditCard" placeholder="#### #### #### ####">
              </div>
              <?php
              if (strpos($fullUrl, "creditCard=wrong") == true) {
                echo "<p class='errorMessage'>Please enter your credit card like this:<br>1234 5678 1234 5678</p>";
              }
              ?>
            </div>
            <div class="an-input">
              <div class="input">
                <label for="expDate">Expiry Date:</label>
                <input type="text" name="expDate" id="expDate" placeholder="mm/yy">
              </div>
              <?php
              if (strpos($fullUrl, "expDate=invalid") == true) {
                echo "<p class='errorMessage'>Please enter your Expiry Date like this:<br>12/34</p>";
              }
              if (strpos($fullUrl, "expDate=expired") == true) {
                echo "<p class='errorMessage'>Please enter a valid credit Card.</p>";
              }
              ?>
            </div>

            <input type="submit" name="submit" value="Confirm">
          </form>

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
