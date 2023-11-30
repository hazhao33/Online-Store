<?php
$server = "localhost";
$user = "root";
$password = "Student123!";
$database = "Espace";
$connection = new mysqli($server, $user, $password, $database);
$total = 0;

?>



    <div class="element-container">
        <div class="item-list-container">
            <div class="item-img">
                <p class="header">Product</p>
                <?php
                foreach ($_COOKIE as $key => $value) {
                    $array = explode(',', $value);
                    if (is_numeric($key)) {
                        echo '<p class="info"><img src="' . $array[2] . '" class="inlineImg" alt=""></p>';
                    }

                }
                ?>
            </div>
            <div class="item-name">
                <p class="header">Product Name</p>
                <?php
                foreach ($_COOKIE as $key => $value) {
                    $array = explode(',', $value);
                    if (is_numeric($key)) {
                        echo '<p class="info">' . $array[0] . '</p>';
                    }
                }
                ?>
            </div>

            <div class="item-quantity">
                <p class="header">Quantity</p>
                <?php
                foreach ($_COOKIE as $key => $value) {
                    $array = explode(',', $value);
                    if (is_numeric($key)) {
                        echo '<p class="info">' . $array[3] . '</p>';
                    }
                }
                ?>
            </div>
            <div class="item-price">
                <p class="header">Price</p>
                <?php
                foreach ($_COOKIE as $key => $value) {
                    $array = explode(',', $value);
                    if (is_numeric($key)) {
                        $total += $array[1]*$array[3];
                        echo '<p class="info">$ ' . $array[1] . '</p>';
                    }
                }
                ?>
                <p  class="info"><a href="../storefront/cart.php" id="goToCart">Go to cart</a></p>
            </div>
        </div>
        <div class="shipping-info checkOutForm" id="shipping-info">

            <h2 class="shipping title">Shipping Address</h2>
            <input placeholder="Full name" type="text" id="shipping-name" name="shipping-name" required>
            <br>
            <input placeholder="Adress" type="text" id="shipping-address" name="shipping-address" required>
            <br>
            <input placeholder="City" type="text" id="shipping-city" name="shipping-city" required>
            <br>
            <?php include "stateSelector.php" ?>
            <input placeholder="Zip code" type="text" id="shipping-zipcode" name="shipping-zipcode" minlength="5" maxlength="5" pattern="[0-9]{5}" title="Enter 5 digits numbers"  required>
            <br>
            <input placeholder="Country" type="text" id="shipping-country" name="shipping-country" required>
            <br>
            <input type="checkbox" id="getAddress" name="getAddress" onclick="loadAddress();"><label for="getAddress" id="checkboxText">same as user address</label>

        </div>

        <div class="payment-info checkOutForm">
            <h2 class="payment title">Payment Information</h2>
            <input placeholder="Full Name" type="text" id="payment-name" name="payment-name" required>
            <br>
            <input placeholder="Card Number" type="text" id="payment-creditcardnumber" name="payment-creditcardnumber" minlength="16" maxlength="16" pattern="[0-9]{16}" title="Enter 16 digits numbers" required>
            <br>
            <span id="exdateContainer">
            <input placeholder="MM" type="text" class="exdate" id="payment-expdate-month" name="payment-expdate-month" maxlength="2" pattern="[0-9]{2}" title="Enter 2 digits numbers"  required>
            <span id="slash">&#47;</span>
            <input placeholder="YY" type="text" class="exdate" id="payment-expdate-year" name="payment-expdate-year" minlength="2" maxlength="2" pattern="[0-9]{2}" title="Enter 2 digits numbers"  required>
            </span>
            <input placeholder="CVV" type="text" id="payment-CCV" name="payment-CCV" maxlength="3" minlength="3" maxlength="3" pattern="[0-9]{3}" title="Enter 3 digits numbers"  required>
            <br>
            <div id="creditCardContainer">
                <img src="../photo/creditcard/VISA.png" alt="" class="creditCard">
                <img src="../photo/creditcard/Mastercard.png" alt="" class="creditCard">
                <img src="../photo/creditcard/American Express.png" alt="" class="creditCard">

            </div>
            <br>
        </div>

        <div class="order-summary-container checkOutForm">
            <h2 class="order title">Order Summary</h2>
            <div class="total-text">
                <ul>
                    <li>Subtotal :</li>
                    <li>Tax :</li>
                    <li>Shipping :</li>
                    <li><strong>Total :</strong></li>
                </ul>
            </div>
            <div>
                <ul class="total-info">
                    <li id="order-subtotal"><?php echo '$'.round($total,2); ?></li>
                    <li id="order-tax"><?php echo '$'.round($total*0.0725,2); ?></li>
                    <li id="order-shipping">$0</li>
                    <li id="order-total"><strong><?php echo '$'.round($total*1.0725,2); ?></strong></li>
                </ul>
            </div>
            <div class="order-btn">
                <input type="submit" id="submitCheckout" value="Place Order">
            </div>

        </div>
    </div>


<?php 
    if(!empty($_POST)){
        $query = "INSERT INTO ORDERSADDRESS (fullname, userid, address, city, state, zip, country)
        VALUES ('".$_POST['shipping-name']."',".$_COOKIE['userid'].",'".$_POST['shipping-address']."','".$_POST['shipping-city']."','".$_POST['shipping-state']."',".$_POST['shipping-zipcode'].",'".$_POST['shipping-country']."')";
        $connection->query($query);
        
        $query = "SELECT orderid FROM ORDERSADDRESS WHERE userid='".$_COOKIE["userid"]."'";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();
        $orderid = $row['orderid'];

        $queryValue = '';
        foreach ($_COOKIE as $key => $value) {
            $array = explode(',', $value);
            if (is_numeric($key)) {
                $queryValue = $queryValue.'('.$orderid.','.$key.','.$_COOKIE['userid'].','.$array[3].'),';
            }
        }

        $query = "INSERT INTO ORDERS (orderid, productid, userid, orderquantity) VALUES ".$queryValue;
        $query = substr($query,0,-1);

        $result = $connection->query($query);
        if($result){
            echo "<script>console.log('TABLE: ORDERSADDRESS is created')</script>";
        }
        else{
            echo "<script>console.log('TABLE: ORDERSADDRESS fail to created')</script>";
        }
        



        echo '<script>window.open("/csc317-group-html-hazhao33/phpform/sendOrderDetail.php","_self")</script>';

        
    }
?>
<?php $connection->close(); ?>
