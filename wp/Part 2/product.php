
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

    if (isset($_GET['id']) && checkFile($_GET['id'], $productInfo))
    {
      // show a single product or service matching id with a purchasing form
      $id = $_GET['id'];
      $smallPrice = getItemInfo($id, $productInfo, 'SML')['Price'];
      $largePrice = getItemInfo($id, $productInfo, 'LRG')['Price'];
      $mediumPrice = getItemInfo($id, $productInfo, 'MED')['Price'];
    }
    else
    {
      // show all products or services without purchasing form
    }
    ?>
    <script src="script.js"></script>
    <script type="text/javascript">
      var currentPrice = <?php echo $smallPrice ?>;
      var smlPrice = <?php echo $smallPrice ?>;
      var medPrice = <?php echo $mediumPrice ?>;
      var lrgPrice = <?php echo $largePrice ?>;
    </script>

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
            <li><a class="active" href="products.php">Menu</a></li>
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
      <div class="product-page">
        <div class="wrapper">
          <h3><?php echo getItemInfo($id, $productInfo, 'SML')['Title'] ?></h3>
          <img class="product-img" src="../../media/<?php echo $id ?>.jpg" alt="product image" id="product-img">
          <div class="product-options">
            <form class="prodcut-form" action="cart.php" method="post">
              <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
              <div class="size">
                <label for="option">Size:</label>
                <select class="size-options" name="option" id="option" onchange="currentPrice = dropDownPrice('price', this.value, smlPrice, medPrice, lrgPrice, currentPrice, document.getElementById('qty').value)">
                  <option value="SML" selected><?php echo getItemInfo($id, $productInfo, 'SML')['Option'] ?></option>
                  <option value="MED"><?php echo getItemInfo($id, $productInfo, 'MED')['Option'] ?></option>
                  <option value="LRG"><?php echo getItemInfo($id, $productInfo, 'LRG')['Option'] ?></option>
                </select>
              </div>
              <div class="quantity">
                <label for="minus">Quantity:</label>
                <button type="button" onclick="decrease('qty'), setPrice('price', document.getElementById('qty').value, currentPrice)" id="minus">-</button>
                <input type="number" name="qty" min="1" max="99" id="qty" value="1" onchange="setPrice('price', this.value, currentPrice)">
                <button type="button" onclick="incrament('qty'), setPrice('price', document.getElementById('qty').value, currentPrice)">+</button>
              </div>
              <p>Price: <span id="price"></span></p>
              <script type="text/javascript">
                document.getElementById("price").innerHTML = "$" + currentPrice.toFixed(2);
              </script>
              <div class="add-cart">
                <input type="submit" value="Add to cart">
              </div>
            </form>
            <p><?php echo getItemInfo($id, $productInfo, 'SML')['Description']?></p>
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
