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

<body>
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
     
     
