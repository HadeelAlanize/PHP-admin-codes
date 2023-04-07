<?php 
session_start();
if(@$_SESSION['user']==""){
    header("Location: account.php");
}

include "mysqli_connect.php";
// LOGIN USER
 $errors = array();
 $success = array();
if (isset($_POST['del_btn'])) {
    $pid = mysqli_real_escape_string($db, $_POST['pid']);
  
    if (empty($pid)) {
        array_push($errors, "Plant ID is required");
    }
    
  
    if (count($errors) == 0) {
        $query = "SELECT * FROM plant WHERE pid='$pid'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 0) {
            array_push($errors, "Plant ID is not valid!");
        }else {
            $delete = mysqli_query($db, "Delete from plant where pid = '$pid'");
            if($delete){
                array_push($success, "Plant is deleted successfully!");
            }
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
	<title> IVY Shop | Admin </title>
	<!-- link to the css-->
    <link rel="stylesheet" href="style.css">
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
            <li> <a href="contact.html">Contact</a> </li>
            <li> <a class="active" href="account.php">Account</a> </li>
                 <li> <a href="FAQ.html">FAQ</a> </li>
            <li> <a href="ncart.php"><i class='bx bxs-cart-alt'></i></a></li>
            </ul>
        </div>    
        </section>
       
    
         <section id="account-page">
        <div class="container">
          
        <div class="row">
        
		<section id="form-details">
              
		<div style="width: 50vw; margin-left : 35vw;">
		<form action="#" method="post"> 
		<div> 
              <h2 style="color:#333">Delete</h2>
            <br>
            <span style="color: red;font-weight:bold;">
                            <?php
                                if($errors){
                                    foreach($errors as $err){
                                        echo $err."<br>";
                                    }
                                }
                            ?>
                            </span>
                            <span style="color: green;font-weight:bold;">
                            <?php
                                if($success){
                                    foreach($success as $su){
                                        echo $su."<br>";
                                    }
                                }
                            ?>
                            </span>
            <br>
            <form name ="deleteForm" method="post" action="#" onsubmit="return validateForm()"> 
			
		</div>
	<div> 
			<label> Enter plant ID <br> </label>
			<br>
			<input type="text" name="pid" width="80%"> 
		</div>
		<div> <button class="normal" type="submit" name="del_btn" style="background-color: #7D8F69;"> Delete </button> </div>
       
		</div>
            </form>
            </div>
            <a  href="logout.php"> <button type="" class="btn">Logout</button></a>
            </section>
            

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
                            var pid = document.forms["deleteForm"]["pid"].value;
                            if (pid==null ||pid == "") 
                            {
                            alert("Please fill out product ID");
                            return false;
                            }
                            if (isNaN(pid) || pid.toString().length != 10)
                            {
                            alert("Please enter 10 numbers in product id")
                            return false;
                            }

                        
                        } </script>
    </body>
</html>
     
     
   
		
		
        
		