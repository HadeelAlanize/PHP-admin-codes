<?php 
session_start();
if(@$_SESSION['user']==""){
    header("Location: account.php");
}
?>
<!DOCTYPE html>

<html>
    
    <body>
       
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
