<?php 
session_start();
if(@$_SESSION['user']==""){
    header("Location: account.php");
}
include "mysqli_connect.php";
 $errors = array();
 $success = array();
if (isset($_POST['add-btn'])) {
    $pid = $_REQUEST['pid'];
    $pname =$_REQUEST['p-name'];
    $des =$_REQUEST['des'];
    $Quantity =$_REQUEST['stock'];
    $price = $_REQUEST['price'];
    $Picture = $_FILES['imageUpload']["name"];

    if (empty($pid)) {
        array_push($errors, "Plant ID is required");
    }
    

    if (count($errors) == 0) 
  
        {
            $query = "INSERT INTO plant (pid, pname, Quantity, price, Picture, Descr ) VALUES ('$pid', '$pname', '$Quantity', '$price', '$Picture', '$des')";
            ?>
            <?php
            $results = mysqli_query($db, $query);
            if($results){
                move_uploaded_file($_FILES["imageUpload"]["tname"],"$Picture");
                array_push($success, "Plant is added successfully!");
            }
            else
            echo mysqli_error($db);
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

		<section id="form-details">
		<div style="width: 50vw; margin-left : 35vw;">
		<form name ="addForm" method="post" action="#" onsubmit="return validateForm()" enctype="multipart/form-data">
		
                        <div> <label>Product ID </label>
                        <input type="text" name="pid"> </div>
                        <div> <label> Product Name </label>
                        <input type="text" name="p-name"> </div>
                        <div> <label>Description </label> 
                        <input type="text" name="des"> </div> 
                        <div> <label>Stock </label> 
                        <input type="number" name="stock"> </div>
                        <div> <label>price </label> 
                        <input type="number" name = "price"> </div> 
                        <div> <label> Picture </label>
                        <input type="file" id="imageUpload" name="imageUpload" > </div>
		<div> <button class="normal" type="submit" name="add-btn" style="background-color: #7D8F69;"> Add </button> </div> 
        
		</div>
		</form> 
       
		</section><div>
 <a  href="logout.php"> <button type="" class="btn">Logout</button></a>
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
                            var pid = document.forms["addForm"]["pid"].value;
                            if (pid==null ||pid == "") 
                            {
                            alert("Please fill out product ID");
                            return false;
                            }
                            if (isNaN(pid) || pid.toString().length != 6)
                            {
                            alert("Please enter 6 numbers in product id")
                            return false;
                            }
                            var pname = document.forms["addForm"]["p-name"].value;
                            if (pname==null ||pname == "") 
                            {
                            alert("Please fill out product name");
                            return false;
                            }
                            if (!pname.match(/^[a-zA-Z\s]+$/))
                            {
                            alert("Please enter letters only in product name")
                            return false;
                            }
                            if (pname.toString().length > 20)
                            {
                            alert("Product name is too long")
                            return false;
                            }
                            var pdescription = document.forms["addForm"]["des"].value;
                            if (pdescription==null ||pdescription == "") 
                            {
                            alert("Please fill out product description");
                            return false;
                            }
                            var stock = document.forms["addForm"]["stock"].value;
                            if (stock==null ||stock == "") 
                            {
                            alert("Please fill out product stock");
                            return false;
                            }
                            if (stock>100 || stock <0)
                            {
                            alert("Product stock cannot be more than 100 or less than 0")
                            return false;
                            }
                            var price = document.forms["addForm"]["price"].value;
                            if (price==null ||price == "") 
                            {
                            alert("Please fill out product price");
                            return false;
                            }
                            if (price <0)
                            {
                            alert("Product price cannot be less than 0")
                            return false;
                            }
                            var img = document.querySelector("#imageUpload");
                            if(document.querySelector("#imageUpload").value == "") {
                            alert("Please upload an image");
                            return false;
                            }
                            if ( /\.(jpe?g|png|gif)$/i.test(img.files[0].name) === false ) 
                            { 
                            alert("Please upload an image");
                            return false;
                            }
                            
                            
                        
                        } 
                        </script>
    </body>
</html>
     
     