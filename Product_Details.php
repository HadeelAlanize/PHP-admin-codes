<?php
session_start();
include "mysqli_connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVY Shop | Product Details</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section id="header">
        <a href="#"><img src="img/Logo_dark.png" class="logo" alt="" width="100" height="100"></a>

        <div>
           <ul id="navbar">
            <li> <a href="Home.php">Home</a> </li>
            <li> <a class="active" href="shop.php">Shop</a> </li>
            <li> <a href="Aboutt.html">About</a></li>
            <li> <a href="contact.html">Contact</a> </li>
            <li> <a href="account.php">Account</a> </li>
                <li> <a href="FAQ.html">FAQ</a> </li>
            <li> <a href="ncart.php"><i class='bx bxs-cart-alt'></i></a></li>
        </div>
    </section>

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="images/<?php echo $_GET["p_image"] ?>" width="100%" id="MainImg" alt="">
         </div>
        

        <div class="single-pro-details">
            <h6>Shop / Product Details </h6>
            <h4><?php echo $_GET["p_name"] ?></h4>
          <h2><?php echo $_GET["p_price"] ?> SAR</h2>
          <h5>ID: <?php echo $_GET["p_id"] ?></h5>

            <br>
            <!-- //// -->
            <form action="Product_Details.php?p_id=<?php echo $_GET["p_id"] ?>" method="post">
                <input type="hidden" name="p_image" value="<?php echo $_GET["p_image"] ?>">
                <input type="hidden" name="p_id" value="<?php echo $_GET["p_id"] ?>">
                <input type="hidden" name="p_name" value="<?php echo $_GET["p_name"] ?>">
                <input type="hidden" name="p_price" value="<?php echo $_GET["p_price"] ?>">
                <input type="hidden" name="Descr" value="<?php echo $_GET["Descr"] ?>">
                <input style="font-size: 24px;" type="number" name="p_quantity" value="1" min="1" max="<?php echo $_GET["p_quantity"] ?>">
                <button style="background-color: #088178;" class="addToCart" type="submit" name="add_to_cart" value="Add To Cart">
                Add To Cart 
                </button>
            <a href="ncart.php" style="background-color: #088178;" class="addToCart">Checkout</a>

            </form>

            <h4>Product Description</h4>
            <span>
                
                <b>Botanical Name:</b> <?php echo $_GET["p_name"] ?><br><br>
                <b>Description:</b> <?php echo $_GET["Descr"] ?></span>
        </div>
    </section>

    <?php
if (isset($_POST["add_to_cart"])) {
    if(isset($_SESSION["cart"])){
        $session_array_id=array_column($_SESSION["cart"],"p_id") ;
        if(!in_array($_GET["p_id"],$session_array_id)){
            $session_array=array(
                "p_id" => $_POST[ "p_id"],
                "p_image" => $_POST[ "p_image"],
                "p_name" => $_POST[ "p_name"],
                "p_price" => $_POST[ "p_price"],
                "p_quantity" => $_POST[ "p_quantity"],
            );
            $_SESSION["cart"][]=$session_array;
            echo "
                                <script> 
                                window.location.href = 'shop.php';
                                </script>
                                ";
        }else{
            foreach ($_SESSION['cart'] as $key => $value) {
                if($value["p_id"]==$_GET["p_id"]){
                    unset($_SESSION["cart"][$key]);
                }
            }
            $session_array=array(
                "p_id" => $_POST[ "p_id"],
                "p_image" => $_POST[ "p_image"],
                "p_name" => $_POST[ "p_name"],
                "p_price" => $_POST[ "p_price"],
                "p_quantity" => $_POST[ "p_quantity"],
            );
            $_SESSION["cart"][]=$session_array;
            echo "
            <script> 
            window.location.href = 'shop.php';
            </script>
            ";
        }

    }else{
        $session_array=array(
            "p_id" => $_POST[ "p_id"],
            "p_image" => $_POST[ "p_image"],
            "p_name" => $_POST[ "p_name"],
            "p_price" => $_POST[ "p_price"],
            "p_quantity" => $_POST[ "p_quantity"],
        );

        $_SESSION["cart"][]=$session_array;
        echo "
        <script> 
        window.location.href = 'shop.php';
        </script>
        ";
    }
}

?>

    <section id="product1" class="section-p1">
        <h2>Pet Friendly</h2>
        <p><center>Our wide variety of pet-friendly plants are perfect for those who share their homes with curious canines and other furry friends. The Pet-Friendly Collection provides a non-toxic option to keep even the most mischievous pets happy and healthy.</p> <center>
        <div class="pro-container">
            <div class="pro">
                <img src="img/Plants/Calathea'Beauty Star'.webp" alt="">
                <div class="des">
                    <span>Live Plant</span>
                    <h5>Calathea'Beauty Star'</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$20</h4>
                </div>
                <a href="ncart.html"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="img/Plants/Emina Fern.webp" alt="">
                <div class="des">
                    <span>Live Plant</span>
                    <h5>Emina Fern.webp</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$22</h4>
                </div>
                <a href="ncart.html"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="img/Plants/NematanthusCandyCorn.webp" alt="">
                <div class="des">
                    <span>Live Plant</span>
                    <h5>Nematanthus Candy Corn</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$22</h4>
                </div>
                <a href="ncart.html"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="img/Plants/Peperomia 'Frost.webp" alt="">
                <div class="des">
                    <span>Live Plant</span>
                    <h5>Peperomia 'Frost</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$18</h4>
                </div>
                <a href="ncart.html"><i class="fal fa-shopping-cart cart"></i></a>
            </div>

        </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span> </p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/Logo_dark.png" alt="" width="90" height="60">
            <h4>Contact</h4>
            <p><strong>Address: </strong> King Faisal In Abd Al Aziz, King Faysal University. Dammam 34212</p>
            <p><strong>Phone:</strong> 013 333 3766</p>
            <p><strong>Hours:</strong> sun-thu: 8:00am-8:00pm</p>
            
            
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
            <h4>About</h4>
            <a href="Aboutt.html">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="contact.html">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="account.php">Sign In</a>
            <a href="ncart.php">View Cart</a>
            <a href="ncart.php">My Wishlist</a>
            <a href="account.php">Track My Order</a>
            <a href="contact.html">Help</a>
        </div>

      
        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="img/pay/Appstore.jpeg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            
        </div>

                   <div class="copyright">
            <p> <center> © 2022, web based project - Class 3, Group 3</center>  </p>
            </div>
    </footer>

   
</body>

</html>