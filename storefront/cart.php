<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ESpace Cart</title>

    <link rel="stylesheet" href="../style/cart.css">
    <link rel="stylesheet" href="../style/headFoot.css">
    <link rel="stylesheet" href="../style/login.css">
    <script src="../javascript/login.js"></script>


</head>

<body onload="checkUser();checkCart();">
    <div class="logo-space" id="toplogo">
        <a href="../storefront/home.html"><img src="../photo/logo2.png" class="h-logo"></a>
    </div>
    <div class="top-nav">
        <ul>
            <li><a href="./home.html">Home</a></li>
            <li><a href="./allProduct.html">Product</a></li>
            <li class="right"><span class="navAnchor active" id="cart" onclick="checkLoginStatus('../storefront/cart.php');">Cart<span id="cartNumber"></span></span></li>
      <li class="right"><span class="navAnchor" onclick="checkLoginStatus('../storefront/user.html');">User</span></li>
            <li class="right">
                <div class="header-dropdown-container" id="userLogOuted">
                    <button type="button" class="header-dropdown-button">Login</button>
                    <div class="header-dropdown-content">
                        <div><a href="../storefront/login.php" class="header-dropdown-login" style="font-size: 1em;" onclick="saveURL();">Login</a></div>
                        <div><span>Not a user?<a href="../storefront/signup.php" class="anchor">Sign up
                                    today.</a></span></div>
                    </div>
                </div>
                <div class="header-dropdown-container" id="userLogined" style="display: none;">
                    <button type="button" class="header-dropdown-button" id="nav-user"></button>
                    <div class="header-dropdown-content">
                        <div><button class="header-dropdown-login" onclick="logOut();">Log out</button></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div id="cart-container">
        <?php
        $server = "localhost";
        $user = "root";
        $password = "Student123!";
        $database = "Espace";
        $connection = new mysqli($server, $user, $password, $database);

        foreach ($_COOKIE as $key => $value) {
            $array = explode(',', $value);
            if (is_numeric($key)) {
                echo '
                    <div class="item" id="'.$key.'">
                    <div class="pimage"><img src="' . $array[2] . '"></div>
                    <div class="pname">
                        <p><a href="../storefront/window-product.html">' . $array[0] . '</a></p>
                    </div>
                    <div class="pquantity"><div class="quantityBtn" onclick="modifyCart('.$key.',0);">-</div><div style="display: inline-block;"></div><div id="'.$key.'quantity" class="numberDisplay">'.$array[3].'</div><div class="quantityBtn" onclick="modifyCart('.$key.',1);">+</div></div>
                    <div class="premove"><button type="button" class="removeBtn" onclick="removeItem('.$key.');">Remove</button></div>
                    <div class="pprice">
                        <p>$' . $array[1] . '</p>
                    </div>
                </div>
        
                    ';
            }
        }
        echo '
        <div id="checkout-btn">
            <a href="./checkoutV2.php">Check Out</a>
        </div>
        ';
        ?>
        
    </div>

    <?php $connection->close(); ?>

    <div class="bot-nav">
        <ul>
            <li><a href="#toplogo"><img class="blogo" src="../photo/logo2.png" alt="logo"></a></li>
            <li><a class="f-text" href="./about.html">About</a></li>
            <li><a class="f-text" href="./faq.html">FAQ</a></li>
            <li class="right"><a href="#twitter"><img class="ficon ficon-r" src="../photo/twitter.png" alt="twitter"></a></li>
            <li class="right"><a href="#facebook"><img class="ficon ficon-m" src="../photo/facebook.png" alt="facebook"></a></li>
            <li class="right"><a href="#instagram"><img class="ficon ficon-l" src="../photo/instagram.png" alt="instagram"></a></li>
        </ul>
    </div>
    <div class="footer">© 2022 ESpace, Inc.</div>
</body>

</html>