<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c|Montserrat:500" rel="stylesheet">
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' rel="stylesheet" type="text/css" href="css/style.css">
    <script src='../wireframe.js'></script>
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
      <div class="menu-background">
        <div class="wrapper">
          <h2 class="menu">The Menu</h2>
          <div class="menu-grid">
            <div class="menu-item">
              <a href="product.php">
                <img class="item-img" src="../../media/whole-chicken.jpg" >
                <div class="item-overlay">
                  <h4 class="item-text">Chicken</h4>
                  <p class="item-text">Enjoy our premium fresh seasoned and perfectly cooked chicken.</p>
                </div>
              </a>
            </div>
            <div class="menu-item">
              <img class="item-img" src="../../media/beef-burger.jpg" >
              <div class="item-overlay">
                <h4 class="item-text">Beef Burger</h4>
                <p class="item-text">Cheese, tomato, lettuce and angus beef. What more could you ask for?</p>
              </div>
            </div>
            <div class="menu-item">
              <img class="item-img" src="../../media/schnitzel-chips.jpg" >
              <div class="item-overlay">
                <h4 class="item-text">Schnitzel and chips</h4>
                <p class="item-text">Lightly breadcrumbed and fried chicken schnitzel served with thick cut crispy chips.</p>
              </div>
            </div>
            <div class="menu-item">
              <img class="item-img" src="../../media/choc lava cake.png" >
              <div class="item-overlay">
                <h4 class="item-text">Choc lava cake</h4>
                <p class="item-text">Steamy gooey rich chocolate inside a soft fluffy cake topped generously with icing powder.</p>
              </div>
            </div>
            <div class="menu-item">
              <img class="item-img" src="../../media/kids-pack.jpg" >
              <div class="item-overlay">
                <h4 class="item-text">Kids Pack</h4>
                <p class="item-text">The Kids Pack contains four nuggets with a small serving of hot chips.</p>
              </div>
            </div>
            <div class="menu-item">
              <img class="item-img" src="../../media/chicken-wrap.jpg" >
              <div class="item-overlay">
                  <h4 class="item-text">Chicken Wrap</h4>
                  <p class="item-text">Soft tortilla bread filled with crispy chicken tenders, tomato and lettuce.</p>
              </div>
            </div>
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
