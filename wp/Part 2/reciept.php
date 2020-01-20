<?php
  if (isset($_POST))
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $creditCard = $_POST['creditCard'];
    $expDate = $_POST['expDate'];
    $urlData = "Location: checkout.php?";

    if (!preg_match("/^[A-Za-z \-.',]{1,250}$/", $name)) {
      $urlData .= "name=wrong&";
    }
    if (!preg_match("/^[A-Za-z0-9 \-.',]{1,250}$/", $address)) {
      $urlData .= "address=wrong&";
    }
    if (empty($email)) {
      $urlData .= "email=empty&";
    }
    if (!preg_match("/^(\(04\)|04|\+614)( ?\d){8}$/", $mobile)) {
      $urlData .= "mobile=wrong&";
    }
    if (!preg_match("/^( ?\d){16}$/", $creditCard)) {
      $urlData .= "creditCard=wrong&";
    }
    if (!preg_match("/^(\d){2}(\/){1}(\d){2}$/", $expDate)) {
      $urlData .= "expDate=invalid";
    }
    else {
    $date = preg_split("#/#", $expDate);
    $year = array_pop($date);
    $month = implode(' ', $date);

      if ((int)$year < date('y'))
      {
        $urlData .= "expDate=expired";
      }
      else {
        if (date('m') >= 11) {
          if ((int)$year <= date('y')) {
            $urlData .= "expDate=expired";
          }
        }
        if ((int)$year == date('y'))
        {
          if ((int)$month <= date('m') + 1) {
            $urlData .= "expDate=expired";
          }
        }
      }
    }
    if ($urlData != "Location: checkout.php?") {
      if (substr($urlData, -1) == "&") {
        $urlData = substr($urlData, 0, -1);
      }
      header($urlData);
      exit;
    }

    session_start();

    if (empty($_SESSION['checkout'])) {
      $_SESSION['checkout'] = array();
    }
    if (isset($_POST['name']))
    {
      $_SESSION['checkout']['name']= $name;
      $_SESSION['checkout']['mobile']= $mobile;
      $_SESSION['checkout']['email']= $email;
      $_SESSION['checkout']['address']= $address;
      $_SESSION['checkout']['creditCard']= $creditCard;
      $_SESSION['checkout']['expDate']= $expDate;
    }
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reciept</title>
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c|Montserrat:500" rel="stylesheet">
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' rel="stylesheet" type="text/css" href="css/style.css">
    <?php
    include 'tools.php';
    $productInfo = getFileInfo();
    $file = 'orders.txt';
    foreach ($_SESSION['cart'] as $item) {
      $orderInfo = "";
      $orderInfo .= date('d');
      $orderInfo .= "/";
      $orderInfo .= date('m');
      $orderInfo .= "/";
      $orderInfo .= date('y');
      $orderInfo .= "\t";
      $orderInfo .= $_SESSION['checkout']['name'];
      $orderInfo .= "\t";
      $orderInfo .= $_SESSION['checkout']['address'];
      $orderInfo .= "\t";
      $orderInfo .= $_SESSION['checkout']['mobile'];
      $orderInfo .= "\t";
      $orderInfo .= $_SESSION['checkout']['email'];
      $orderInfo .= "\t";
      $orderInfo .= $item['id'];
      $orderInfo .= "\t";
      $orderInfo .= $item['option'];
      $orderInfo .= "\t";
      $orderInfo .= $item['qty'];
      $orderInfo .= "\t";
      $orderInfo .= getItemInfo($item['id'], $productInfo, $item['option'])['Price'];
      $subPrice = getItemInfo($item['id'], $productInfo, $item['option'])['Price'] * $item['qty'];
      $orderInfo .= "\t";
      $orderInfo .= (double)$subPrice;
      $orderInfo .= "\n";
      file_put_contents($file, $orderInfo, FILE_APPEND | LOCK_EX);
    }
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
      <div class="wrapper">
        <div class="tax-Invoice" id="tax Invoice">
          <div class="title">
            <h1>Charcoal Chicken</h1>
            <hr>
          </div>
          <div class="all-info">
            <div class="Client-info">
              <div class="oneInfo">
                <h3>Name:</h3>
                <p><?php echo $name ?></p>
              </div>
              <hr>
              <div class="oneInfo">
                <h3>Email:</h3>
                <p><?php echo $email ?></p>
              </div>
              <hr>
              <div class="oneInfo">
                <h3>Address:</h3>
                <p><?php echo $address ?></p>
              </div>
              <hr>
              <div class="oneInfo">
                <h3>Mobile Phone:</h3>
                <p><?php echo $mobile ?></p>
              </div>
              <hr>
              <div class="oneInfo">
                <h3>Credit Card:</h3>
                <p>#### #### #### <?php echo substr($creditCard, -4) ?></p>
              </div>
            </div>
            <div class="store-Info">
              <div class="location-info">
                <h3>Store Location</h3>
                <p>Shop 61,Endeavour Hills</p>
                <p>Shopping Centre,</p>
                <p>Corner Matthew Flinders</p>
                <p>Ave & Heatherton Road,</p>
                <p>Endeavour Hills VIC 3802</p>
              </div>
            </div>
          </div>
          <div class="Items">
            <div class="reciept-Grid">
              <div class='reciept-head'>Items</div>
              <div class='reciept-head'>Each</div>
              <div class='reciept-head'>Quantity</div>
              <div class='reciept-head'>Total</div>
              <?php
              foreach ($_SESSION['cart'] as $item) {
                echo "<div class='reciept-item'>";
                echo getItemInfo($item['id'], $productInfo, $item['option'])['Option'];
                echo " ";
                echo getItemInfo($item['id'], $productInfo, $item['option'])['Title'];
                echo "</div>\n";
                echo "<div class='reciept-item'>$\n\t";
                echo "<script type='text/javascript'>\n\t";
                echo "var price = ";
                echo getItemInfo($item['id'], $productInfo, $item['option'])['Price'];
                echo ";\n\t";
                echo "document.write(price.toFixed(2));\n";
                echo "</script>\n";
                echo "</div>\n";
                echo "<div class='reciept-item'>";
                echo $item['qty'];
                echo "</div>\n";
                echo "<div class='reciept-item'>$\n\t";
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
                echo "</div>";
              }
              ?>
            </div>
            <h3 class="recieptTotal">Total: $
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
          </div>
        </div>
        <div class="printButton">
          <input type="button" onclick="printDiv('tax Invoice')" value="Print Reciept"/>
          <form method="post" action="products.php">
            <input type="submit" name="cancel" value="Done">
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
