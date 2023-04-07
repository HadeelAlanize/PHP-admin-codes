<?php 
session_start();
if(@$_SESSION['user']==""){
    header("Location: account.php");
}
?>
<!DOCTYPE html>

<html>
    
    <body>
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
