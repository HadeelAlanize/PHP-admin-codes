<?php 
session_start();
if(@$_SESSION['user']==""){
    header("Location: account.php");
}
?>
<!DOCTYPE html>

<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Cmpatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title> IVY Shop | Admin </title>
    <!-- link to the css-->
    <link rel="stylesheet" href="style.css">
    <!-- box icons -->
    <link href='http://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> 
</head>
    
    <body>
        <section id="header">
        <a href="Home.php"> <img src="img/Logo_dark.png" class="logo" alt="" width="100" height="100"></a>
            
        <div>
            <ul id="navbar">
            <li> <a href="Home.php">Home</a> </li>
            <li> <a href="shop.php">Shop</a> </li>
            <li> <a href="Aboutt.html">About</a></li>
            <li> <a  href="contact.html">Contact</a> </li>
            <li> <a class="active" href="Account.php">Account</a> </li>
                 <li> <a href="FAQ.html">FAQ</a> </li>
            <li> <a href="ncart.php"><i class='bx bxs-cart-alt'></i></a></li>
            </ul>
        </div>    
        </section>
        <section id="Admin-page">
        <div class="container">
        <div class="row">
            <div class="col-2">
            <img src="img/header6.jpg" >
            </div>
            <div class="col-2">
            <div class="form-container">
       <h4>Welcome Admin</h4>
           <ul>
               <li>  <a  href="admin-add.php"><button type="" class="btn">Add</button></a>  </li>
                 <li> <a  href="admin-delete.php"><button type="" class="btn">Delete</button></a></li>
                <li>  <a  href="admin-modify.php"> <button type="" class="btn">Modify</button></a></li>
                <li>  <a  href="logout.php"> <button type="" class="btn">Logout</button></a></li>
            </ul>
                
            </div>
            </div>
            </div>
            </div>
            </section>
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
            <h4> Install app </h4>
                <p> from app store or google play </p>
                <div class="row">
                <img src="img/pay/Appstore.jpeg" alt="">
                <img src="img/pay/play.jpg" alt="">
                </div>
                <p> Secured payment gateway </p>
                <img src="img/pay/payment.png" alt="">
            </div>
            <div class="copyright">
            <p> © 2022, web based project - Class 3, Group 3 </p>
            </div>
        </footer>
         <script>
        var MainImg = document.getElementById("MainImg");
        var smallimg = document.getElementsByClassName("small-img");

        smallimg[0].onclick = function() {
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function() {
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function() {
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function() {  
            MainImg.src = smallimg[3].src;
        }
    </script>


    <script src="script.js"></script>
    </body>
</html>