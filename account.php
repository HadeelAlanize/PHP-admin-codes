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
