<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>login</title>
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
                        <button type="button" class="header-dropdown-button" id="nav-user"></button>
                        <div class="header-dropdown-content">
                            <div><button class="header-dropdown-login" onclick="logOut();">Log out</button></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div>
            <?php
            $server = "localhost";
            $user = "root";
            $password = "Student123!";
            $database = "Espace";
            $connection = new mysqli($server, $user, $password, $database);

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

            require 'vendor/autoload.php';

            $userid = $_COOKIE['userid'];
            $query = "SELECT orderid, fullname, address, city, state, zip, country FROM ORDERSADDRESS WHERE userid='" . $userid . "'";
            $result = $connection->query($query);
            // output data of each row
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();




                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'junkccccc@gmail.com';
                $mail->Password = 'Kevmzchoek';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->setFrom('junkccccc@gmail.com', 'ESpace.com');
                $mail->addAddress('junkccccc@gmail.com', $row['fullname']);
                $mail->isHTML(true);
                $mail->Subject = 'Order Details';


                $content = '
                    <h2>Your Order : ' . $row['orderid'] . '</h2>

                    <p>will be shipped to:</p><br>' . $row['fullname'] . '<br>' . $row['address'] . '<br>' . $row['city'] . ', ' . $row['state'] . ', ' . $row['zip'] . ', ' . $row['country'] . '<br><br><br>Thanks for your order!';
                //echo $content;

                foreach ($_COOKIE as $key => $value) {
                    $array = explode(',', $value);
                    if (is_numeric($key)) {
                        $content = $content.'
                        <br><div style="display: flex;margin-bottom: 10px;">
                            <div style="margin: 0 20px;">'.$array[0].'</div>
                            <div style="margin: 0 20px;">'.$array[1].'</div>
                            <div style="margin: 0 20px;">x '.$array[3].'</div>
                        </div>
                        ';
                    }
                }



                $mail->Body    = $content;
                $mail->send();
                header("Location: /csc317-group-html-hazhao33/storefront/home.html");
            }

            $connection->close();
            ?>
        </div>

        <div class="promotion1">
            <a href="../storefront/signup.html">
                FREE STANDARD SHIPPING & RETURN | JOIN NOW GET 25% Off
            </a>
            <p>The Best way to buy the laptops you love.</p>
        </div>
        <hr>
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