<?php

@include '../config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_price = $_POST['product_price'];
   $product_qty = $_POST['product_qty'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_imgC/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE cakes SET C_Name='$product_name', C_Price='$product_price', C_Image='$product_image',C_Qty='$product_qty'  WHERE C_id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:cakes.php');
      }else{
         $message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">

<div class="product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM cakes WHERE C_Id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
 
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <h2 class="title">Product Name</h2><input type="text" class="box" name="product_name" value="<?php echo $row['C_Name']; ?>" placeholder="Product name">
      <h2 class="title">Product Price</h2><input type="number" min="0" class="box" name="product_price" value="<?php echo $row['C_Price']; ?>" placeholder="Product Price">
      <h2 class="title">Product Quantity</h2><input type="Qty" placeholder="Quantity" name="product_qty" class="box" value="<?php echo $row['C_Qty']; ?>" required>
      <h2 class="title">Product Image</h2><input type="file" class="box" name="product_image"  value="<?php echo $row['C_Image']; ?>" accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="cakes.php" class="btn">go back!</a>
   </form>
   

   <?php }; ?>

   

</div>

</div>

</body>
</html>