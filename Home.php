<?php
session_start();
include "mysqli_connect.php";
$result = $db->query("SELECT * FROM plant where Quantity>0");

?>
<!DOCTYPE html>
 <html>
 
     <body>
         
        <section id="header">
        <a href="Home.php"> <img src="img/Logo_dark.png" class="logo" alt="" width="100" height="100"></a>      
     
     
      <div>
            <ul id="navbar">
            <li> <a class="active" href="Home.php">Home</a> </li>
            <li> <a href="shop.php">Shop</a> </li>
            <li> <a href="Aboutt.html">About</a></li>
            <li> <a href="contact.html">Contact</a> </li>
                <li> <a href="account.php">Account</a> </li>
                 <li> <a href="FAQ.html">FAQ</a> </li>
            <li> <a href="ncart.php"><i class='bx bxs-cart-alt'></i></a></li>
            </ul>
        </div>    
        </section>
     
     

         
         <br>
        
         <section style = "color:#FFBEB5; font-size: 20px; font-weight: 500; text-align: center; border:#2D895F solid 0.1em; padding:1em;"> 
          
          
         </section>
         <section id="product1" class="section-p1">
        <div class="pro-container">
            <?php
            while ($row = $result->fetch_assoc()) { ?>
               
                    <div class="pro" >
                    <a style="text-decoration: none; width: 350px; " href="Product_Details.php?p_id=<?php echo $row["pid"] ?>&
                    p_name=<?php echo $row["pname"] ?>&
                    p_image=<?php echo $row["Picture"] ?>&
                    p_price=<?php echo $row["price"] ?>&
                    p_quantity=<?php echo $row["Quantity"] ?>">
                        <img src="images/<?php echo $row["Picture"] ?>" height="350px">
                    </a>
                        <div class="des">
                            <span>Live Plant</span>
                            <h5><?php echo $row["pname"]  ?></h5>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4><?php echo $row["price"] ?> SAR</h4>
                            <h5>ID: <?php echo $row["pid"]  ?></h5>
                        </div>
                        <form action="shop.php?p_id=<?php echo $row["pid"] ?>" method="post">
                            <input type="hidden" name="p_image" value="<?php echo $row["Picture"] ?>">
                            <input type="hidden" name="p_id" value="<?php echo $row["pid"] ?>">
                            <input type="hidden" name="p_name" value="<?php echo $row["pname"] ?>">
                            <input type="hidden" name="p_price" value="<?php echo $row["price"] ?>">
                            <input style="width: 50px; font-size: large;" type="number" name="p_quantity" value="1" min="1" max="<?php echo $row["Quantity"] ?>">
                            <button type="submit" name="add_to_cart" value="add_to_cart"> <i class="bx bxs-cart-alt cart"></i>
                            </button>
                        </form>
                    </div>
            <?php  } ?>

        </div>
    </section>

    <?php
    if (isset($_POST["add_to_cart"])) {
        if (isset($_SESSION["cart"])) {
            $session_array_id = array_column($_SESSION["cart"], "p_id");
            if (!in_array($_GET["p_id"], $session_array_id)) {
                $session_array = array(
                    "p_id" => $_POST["p_id"],
                    "p_image" => $_POST["p_image"],
                    "p_name" => $_POST["p_name"],
                    "p_price" => $_POST["p_price"],
                    "p_quantity" => $_POST["p_quantity"],
                );
                $_SESSION["cart"][] = $session_array;
            } else {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($value["p_id"] == $_GET["p_id"]) {
                        unset($_SESSION["cart"][$key]);
                    }
                }
                $session_array = array(
                    "p_id" => $_POST["p_id"],
                    "p_image" => $_POST["p_image"],
                    "p_name" => $_POST["p_name"],
                    "p_price" => $_POST["p_price"],
                    "p_quantity" => $_POST["p_quantity"],
                );
                $_SESSION["cart"][] = $session_array;
            }
        } else {
            $session_array = array(
                "p_id" => $_POST["p_id"],
                "p_image" => $_POST["p_image"],
                "p_name" => $_POST["p_name"],
                "p_price" => $_POST["p_price"],
                "p_quantity" => $_POST["p_quantity"],
            );

            $_SESSION["cart"][] = $session_array;
        }
    } ?>
<footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/Logo_dark.png" alt="" width="100" height="100">
            <h4> Contact </h4>
            <p> <strong> Address: </strong> King Faisal Ibn Abd Al Aziz, King Faysal University, Dammam 34212 </p>
            <p> <strong> Phone: </strong> 013 333 3766 </p>
            <p> <strong> Hours: </strong> sun-thu: 8:00am-8:00pm </p>
            
            
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>



        <div class="col">
            <h4>My Account</h4>
            <a href="account.php">Sign In</a>
            <a href="ncart.php">View Cart</a>
            <a href="ncart.php">My Wishlist</a>
            <a href="account.php">Track My Order</a>
            <a href="contact.html">Help</a>
        </div>

         
            
        </footer>
         
         
 


    
    </body>
</html>
     
     
     
