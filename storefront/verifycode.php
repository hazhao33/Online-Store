<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Verify code</title>
  <link rel="stylesheet" href="../style/home.css">

  <script src="../javascript/login.js"></script>
  <link rel="stylesheet" href="../style/login.css">

</head>

<body onload="checkUser();checkCart();">

  <div class="grid-container">
    <div class="logo-space" id="toplogo">
      <a href="../storefront/home.html"><img src="../photo/logo2.png" class="h-logo"></a>
    </div>
    <div class="top-nav">
      <ul>
        <li><a class="active" href="./home.html">Home</a></li>
        <li><a href="./allProduct.html">Product</a></li>
        <li class="right"><a href="./cart.php" id="cart">Cart<span id="cartNumber"></span></a></li>
        <li class="right"><a href="./user.html">User</a></li>
        <li class="right">
          <div class="header-dropdown-container" id="userLogOuted">
            <button type="button" class="header-dropdown-button">Login</button>
            <div class="header-dropdown-content">
              <div><a href="../storefront/login.php" class="header-dropdown-login" style="font-size: 1em;" onclick="saveURL();">Login</a></div>
              <div><span>Not a user?<a href="../storefront/signup.php" class="anchor">Sign up today.</a></span></div>
            </div>
          </div>
          <div class="header-dropdown-container" id="userLogined" style="display: none;">
            <button type="button" class="header-dropdown-button"></button>
            <div class="header-dropdown-content">
              <div><button class="header-dropdown-login" onclick="logOut();">Log out</button></div>
            </div>
          </div>
        </li>
      </ul>
    </div>

    <div class="promotion1">
      <a href="../storefront/signup.html">
        FREE STANDARD SHIPPING & RETURN | JOIN NOW GET 25% Off
      </a>
      <p>The Best way to buy the laptops you love.</p>
    </div>
    <hr>
    <center>
      <div class="newlogin">

        <form action="../storefront/verifycode.php" method="post" class="loginform">
          <?php include "../phpform/verifycodeform.php"; ?>
        </form>
      </div>
    </center>
    <hr>
    <div class="bot-nav">
      <ul>
        <li><a href="#toplogo">
            <img class="blogo" src="../photo/logo2.png" alt="logo">
          </a></li>
        <li><a class="f-text" href="./about.html">About</a></li>
        <li><a class="f-text" href="./faq.html">FAQ</a></li>
        <li class="right"><a href="#twitter">
            <img class="f-icon" src="../photo/twitter.png" alt="twitter">
          </a></li>
        <li class="right"><a href="#facebook">
            <img class="f-icon" src="../photo/facebook.png" alt="facebook">
          </a></li>
        <li class="right"><a href="#instagram">
            <img class="f-icon" src="../photo/instagram.png" alt="instagram">
          </a></li>
      </ul>
    </div>
    <div class="item4">© 2022 ESpace, Inc.</div>
  </div>
</body>

</html>