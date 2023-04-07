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
    
<body>
      
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
     
     
   
		
		
        
		
