<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c|Montserrat:500" rel="stylesheet">
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' rel="stylesheet" type="text/css" href="css/style.css">
    <script src='../wireframe.js'></script>
    <script type="text/javascript">
      function dropDown(imageId,imageName) {
        document.getElementById(imageId).src = "../../media/" + imageName + "-chicken.jpg";
      }
      function incrament() {
        if (document.getElementById("qty").value < 99) {
          document.getElementById("qty").value++;
        }
      }
      function decrease() {
        if (document.getElementById("qty").value > 1) {
          document.getElementById("qty").value--;
        }
      }
    </script>
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
            <li class="button"><a href="#" class="cart-link"><img class="cart" src="../../media/shopping_cart.png"</img></a></li>
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
          <h3>Chicken</h3>
          <img class="product-img" src="../../media/whole-chicken.jpg" alt="product image" id="product-img">
          <div class="product-options">
            <form class="procut-form" action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php?ref=product" method="post">
              <input type="hidden" name="id" id="id" value="chicken">
              <div class="size">
                <label for="option">Size:</label>
                <select class="size-options" name="option" id="option"onchange="dropDown('product-img',this.value)">
                  <option value="whole" selected>Whole</option>
                  <option value="half">Half</option>
                  <option value="quarter">Quarter</option>
                </select>
              </div>
              <div class="quantity">
                <label for="minus">Quantity:</label>
                <button type="button" onclick="decrease()" id="minus">-</button>
                <input type="number" name="qty" min="1" max="99" id="qty" value="1">
                <button type="button" onclick="incrament()">+</button>
              </div>
              <div class="add-cart">
              <input type="submit" value="Add to cart">
              </div>
            </form>
            <p>Our chicken is cooked fresh in store each day and seasoned to perfection.
               We use special coal to enhance the flavour, ensure there is a crispy skin
               which fully brings out that distinctive charcoal taste. All our chickens
               are served with filling on the side that you can enjoy. Chicken that’s so good its hard to refuse.</p>
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
          <h5>  &copy;
           <script>
             document.write(new Date().getFullYear());
           </script>
           Andy Pham, s3722315 A2-s3721278-s3722315.</h5>
           <h5>Disclaimer: This website is not a real website and is being developed
            as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</h5>
        </div>
        <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
  </body>
</html>
