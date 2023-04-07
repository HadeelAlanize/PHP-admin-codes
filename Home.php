<?php
session_start();
include "mysqli_connect.php";
$result = $db->query("SELECT * FROM plant where Quantity>0");

?>
<!DOCTYPE html>
 <html>
 
     <body>
         <section id="product1" class="section-p1">
        <div class="pro-container">
            <?php
            while ($row = $result->fetch_assoc()) { ?>
               
                    <div class="pro" >
                    <a style="text-decoration: none; width: 350px; " href="Product_Details.php?p_id=<?php echo $row["pid"] ?>&
                    p_name=<?php echo $row["pname"] ?>&
                    p_image=<?php echo $row["Picture"] ?>&
                    p_price=<?php echo $row["price"] ?>&
                    p_quantity=<?php echo $row["Quantity"] ?>">
                        <img src="images/<?php echo $row["Picture"] ?>" height="350px">
                    </a>
                        <div class="des">
                            <span>Live Plant</span>
                            <h5><?php echo $row["pname"]  ?></h5>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4><?php echo $row["price"] ?> SAR</h4>
                            <h5>ID: <?php echo $row["pid"]  ?></h5>
                        </div>
                        <form action="shop.php?p_id=<?php echo $row["pid"] ?>" method="post">
                            <input type="hidden" name="p_image" value="<?php echo $row["Picture"] ?>">
                            <input type="hidden" name="p_id" value="<?php echo $row["pid"] ?>">
                            <input type="hidden" name="p_name" value="<?php echo $row["pname"] ?>">
                            <input type="hidden" name="p_price" value="<?php echo $row["price"] ?>">
                            <input style="width: 50px; font-size: large;" type="number" name="p_quantity" value="1" min="1" max="<?php echo $row["Quantity"] ?>">
                            <button type="submit" name="add_to_cart" value="add_to_cart"> <i class="bx bxs-cart-alt cart"></i>
                            </button>
                        </form>
                    </div>
            <?php  } ?>

        </div>
    </section>

    <?php
    if (isset($_POST["add_to_cart"])) {
        if (isset($_SESSION["cart"])) {
            $session_array_id = array_column($_SESSION["cart"], "p_id");
            if (!in_array($_GET["p_id"], $session_array_id)) {
                $session_array = array(
                    "p_id" => $_POST["p_id"],
                    "p_image" => $_POST["p_image"],
                    "p_name" => $_POST["p_name"],
                    "p_price" => $_POST["p_price"],
                    "p_quantity" => $_POST["p_quantity"],
                );
                $_SESSION["cart"][] = $session_array;
            } else {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($value["p_id"] == $_GET["p_id"]) {
                        unset($_SESSION["cart"][$key]);
                    }
                }
                $session_array = array(
                    "p_id" => $_POST["p_id"],
                    "p_image" => $_POST["p_image"],
                    "p_name" => $_POST["p_name"],
                    "p_price" => $_POST["p_price"],
                    "p_quantity" => $_POST["p_quantity"],
                );
                $_SESSION["cart"][] = $session_array;
            }
        } else {
            $session_array = array(
                "p_id" => $_POST["p_id"],
                "p_image" => $_POST["p_image"],
                "p_name" => $_POST["p_name"],
                "p_price" => $_POST["p_price"],
                "p_quantity" => $_POST["p_quantity"],
            );

            $_SESSION["cart"][] = $session_array;
        }
    } ?>
         
    
    </body>
</html>
     
     
     
