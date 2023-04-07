<?php 
session_start();
if(@$_SESSION['user']==""){
    header("Location: account.php");
}
include "mysqli_connect.php";
?> 

<?php
 $errors = array();
 $success = array();
 if (isset($_POST['modi-btn'])) {
    $pid = $_REQUEST['pid'];
    $pname =$_REQUEST['pname1'];
    $Quantity =$_REQUEST['stock'];
    $des =$_REQUEST['des'];
    $price = $_REQUEST['price'];
    $Picture = $_FILES['imageUpload']["name"];
   
    if (empty($pid)) {
        array_push($errors, "Plant ID is required");
    }
     
    if (count($errors) == 0) 
        {
            $que = "SELECT * FROM plant WHERE pid='$pid'";
            $idresult = mysqli_query($db, $que);
            $query="UPDATE plant SET pname='$pname', Quantity= '$Quantity', price= '$price',  Picture= '$Picture', Descr='$des'
                 where pid='$pid'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($idresult) == 0) {
                array_push($errors, "Plant ID is not valid!");
                
            }
            else {
            move_uploaded_file($_FILES['imageUpload']["tname"], "$Picture");
            array_push($success, "Plant is Updated successfully!");  
          
            }
        }
    
  }
?>
<!DOCTYPE html>

<html>
   
</head>
<body>
        
         <section id="account-page">
        <div class="container">
        <div class="row">
		<section id="form-details">
		<div style="width: 50vw; margin-left : 35vw;">
        <div> 
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
        <form name ="search" method="post" action="#" >
			<label> search </label> 
<div> <input type="text" name= "searching" placeholder="plant ID"> <button class="normal" type="submit" name="searchB" style="background-color: #7D8F69" >Search </button> </div> 
		</div>
                            
                        </form>

		<form name ="modifyForm" method="post" action="#" onsubmit="return validateForm()" enctype="multipart/form-data">
		
		<div> <label>Plant id </label>
		<input type="text" name="pid"> </div>
		<div> <label> Product name </label>
		<input type="text" name="pname1"> </div>
        <div> <label>Description </label> 
		<input type="text" name = "des"> </div>
		<div> <label>Stock </label> 
		<input type="number" name="stock"> </div> 
        <div> <label>price </label> 
        <input type="number" name = "price"> </div>
		<div> <label> Image </label>
		<input type="file" id="imageUpload" name = "imageUpload" > </div>
		<!---<input type="file" > </div>-->
		<div> <button class="normal" type="submit" name="modi-btn" style="background-color: #7D8F69;"> update </button> </div> 
        
		</div>
		</form> 
        <section id="product1" class="section-p1">
        <div class="pro-container">
            <?php
             if (isset($_POST['searchB'])) {
                
                 
                $search= $_REQUEST['searching'];
                if (empty($search)) {
                    array_push($errors, "Plant ID is required");
                }
                $sql= "SELECT * FROM plant WHERE pid ='$search' ";
                $result = mysqli_query($db, $sql);
                if (mysqli_num_rows($result) == 0) {
                    array_push($errors, "Plant ID is not valid!");
                }
                else{
                 while ($row = $result->fetch_assoc()) { ?>
               
                <div class="pro" >
                <h3> ID=<?php echo $row["pid"] ?></h3>
                <h3> Plant name =  <?php echo $row["pname"] ?></h3>
                <h3>  image=<?php echo $row["Picture"] ?></h3>
                <h3>  price=<?php echo $row["price"] ?></h3>
                <h3> quantity=<?php echo $row["Quantity"] ?></h3>
                <h3> description=<?php echo $row["Descr"] ?>
                <h3>   <img src="images/<?php echo $row["Picture"] ?>" height="350px"></h3>
                  <?php  }}} 
                  ?>
            </div>
            <a  href="logout.php"> <button type="" class="btn">Logout</button></a>

            </section>
            </div>
             </div>
             
    </section>
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
     
        

        <script type="text/javascript">
                        function validateForm() {
                            var pid = document.forms["modifyForm"]["pid"].value;
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
                            var pname = document.forms["modifyForm"]["pname1"].value;
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
                            var pdescription = document.forms["modifyForm"]["des"].value;
                            if (pdescription==null ||pdescription == "") 
                            {
                            alert("Please fill out product description");
                            return false;
                            }
                            var stock = document.forms["modifyForm"]["stock"].value;
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
                            var price = document.forms["modifyForm"]["price"].value;
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

                        
                        } </script>
    </body>
</html>
     
     
