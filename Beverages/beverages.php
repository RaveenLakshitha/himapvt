<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>HimaPvt</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <!--HEADER-->
    <section class="header">

   <a href="../../home.php" class="logo">Hima</a>

   <nav class="navbar">
      <a href="../Cakes/cakes.php">Cakes</a>
      <a href="beverages.php">Beverages</a>
      <a href="../../about.php">About Us</a>
      <a href="../../contact.php">Contact Us</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>
    <!--HEADER-->
</section>

</body>
</html>

<body>

<h1 class="Title">Beverages</h1> 
<div class="container">

   <div class="product-form-container">

      <form action="addItemBeva.php" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3>
         <input type="text" placeholder="Product name" name="product_name" required class="box">
         <input type="number" placeholder="Product Price" name="product_price" class="box" required>
         <input type="number" placeholder="Quantity" name="product_qty" class="box" required>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box" required>
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>

   <?php
@include '../config.php';
   $select = mysqli_query($conn, "SELECT * FROM beverages");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
         <th>Id</th>
            <th>Name</th>
            <th> Image</th>
            <th>Price</th>
            <th></th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['B_Id']; ?></td>
            <td><?php echo $row['B_Name']; ?></td>
            <td><img src="uploaded_imgB/<?php echo $row['B_Image']; ?>" height="100" alt=""></td>
            <td>$<?php echo $row['B_Price']; ?>/-</td>
            <td>
               <a href="updateBeva.php?edit=<?php echo $row['B_Id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="deleteBeva.php?delete=<?php echo $row['B_Id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>