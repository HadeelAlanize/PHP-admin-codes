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
