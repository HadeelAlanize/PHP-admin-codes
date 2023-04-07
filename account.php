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
