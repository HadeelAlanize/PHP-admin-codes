<?php 
session_start();

if(@$_SESSION['user']!=""){
    header("Location: admin.php");
}

include "mysqli_connect.php";
// LOGIN USER
 $errors = array();
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        //$password = md5($password);
        $query = "SELECT * FROM admin WHERE adminuser='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if ($r = mysqli_fetch_array($results)) {
          $_SESSION['user'] = $r['aid'];
          $_SESSION['success'] = "You are now logged in";
          header('location: admin.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
?>
<!DOCTYPE html>

<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Cmpatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title> IVY Shop | Account </title>
    <!-- link to the css-->
    <link rel="stylesheet" href="style.css">
    <!-- box icons -->
    <link href='http://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> 
</head>
    
    <body>
    <div id="display-image">
        
    </div>
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
        <section id="account-page" >
            <div class="container" >
                <div class="row">
                    <div class="col-2">
                        <img src="img/Header3.jpeg" >
                        </div>
                    <div class="col-2">
                        <div class="form-container">
                            
                            
                        <form name ="accountForm" method="post" action="#" onsubmit="return validateForm()">
                              
                            <h4>Admin Login</h4>
                            <span style="color: red;font-weight:bold;">
                            <?php
                                if($errors){
                                    foreach($errors as $err){
                                        echo $err."<br>";
                                    }
                                }
                            ?>
                            </span>
                            <br><br><br>
                                <input type="text" name="username" placeholder="Username">
                                <input type="password" name="password" placeholder="Password">
                                <button type="submit" class="btn" name="login_user">Login</button>
                             
                                    
                                </form>
                               </div>
                                
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
            <p> <center> © 2022, web based project - Class 3, Group 3</center>  </p>
            </div>
        </footer>
        <script type="text/javascript">
                        function validateForm() {
                            var username = document.forms["accountForm"]["username"].value;
                            if (username==null ||username == "") 
                            {
                            alert("Username must be filled out");
                            return false;
                            }
                            var password=document.forms["accountForm"]["password"].value;
                            if (password==null || password=="")
                            {
                            alert("Password must be filled out");
                            return false;
                            }

                        
                        } </script>
        
        
            
        </section>
    </body>
</html>