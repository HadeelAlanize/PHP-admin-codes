<?php
session_start();
include "mysqli_connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="images/<?php echo $_GET["p_image"] ?>" width="100%" id="MainImg" alt="">
         </div>
        

        <div class="single-pro-details">
            <h6>Shop / Product Details </h6>
            <h4><?php echo $_GET["p_name"] ?></h4>
          <h2><?php echo $_GET["p_price"] ?> SAR</h2>
          <h5>ID: <?php echo $_GET["p_id"] ?></h5>

            <br>
            <!-- //// -->
            <form action="Product_Details.php?p_id=<?php echo $_GET["p_id"] ?>" method="post">
                <input type="hidden" name="p_image" value="<?php echo $_GET["p_image"] ?>">
                <input type="hidden" name="p_id" value="<?php echo $_GET["p_id"] ?>">
                <input type="hidden" name="p_name" value="<?php echo $_GET["p_name"] ?>">
                <input type="hidden" name="p_price" value="<?php echo $_GET["p_price"] ?>">
                <input type="hidden" name="Descr" value="<?php echo $_GET["Descr"] ?>">
                <input style="font-size: 24px;" type="number" name="p_quantity" value="1" min="1" max="<?php echo $_GET["p_quantity"] ?>">
                <button style="background-color: #088178;" class="addToCart" type="submit" name="add_to_cart" value="Add To Cart">
                Add To Cart 
                </button>
            <a href="ncart.php" style="background-color: #088178;" class="addToCart">Checkout</a>

            </form>

            <h4>Product Description</h4>
            <span>
                
                <b>Botanical Name:</b> <?php echo $_GET["p_name"] ?><br><br>
                <b>Description:</b> <?php echo $_GET["Descr"] ?></span>
        </div>
    </section>

    <?php
if (isset($_POST["add_to_cart"])) {
    if(isset($_SESSION["cart"])){
        $session_array_id=array_column($_SESSION["cart"],"p_id") ;
        if(!in_array($_GET["p_id"],$session_array_id)){
            $session_array=array(
                "p_id" => $_POST[ "p_id"],
                "p_image" => $_POST[ "p_image"],
                "p_name" => $_POST[ "p_name"],
                "p_price" => $_POST[ "p_price"],
                "p_quantity" => $_POST[ "p_quantity"],
            );
            $_SESSION["cart"][]=$session_array;
            echo "
                                <script> 
                                window.location.href = 'shop.php';
                                </script>
                                ";
        }else{
            foreach ($_SESSION['cart'] as $key => $value) {
                if($value["p_id"]==$_GET["p_id"]){
                    unset($_SESSION["cart"][$key]);
                }
            }
            $session_array=array(
                "p_id" => $_POST[ "p_id"],
                "p_image" => $_POST[ "p_image"],
                "p_name" => $_POST[ "p_name"],
                "p_price" => $_POST[ "p_price"],
                "p_quantity" => $_POST[ "p_quantity"],
            );
            $_SESSION["cart"][]=$session_array;
            echo "
            <script> 
            window.location.href = 'shop.php';
            </script>
            ";
        }

    }else{
        $session_array=array(
            "p_id" => $_POST[ "p_id"],
            "p_image" => $_POST[ "p_image"],
            "p_name" => $_POST[ "p_name"],
            "p_price" => $_POST[ "p_price"],
            "p_quantity" => $_POST[ "p_quantity"],
        );

        $_SESSION["cart"][]=$session_array;
        echo "
        <script> 
        window.location.href = 'shop.php';
        </script>
        ";
    }
}

?>
   
</body>

</html>
