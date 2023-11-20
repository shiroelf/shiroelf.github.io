<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>Khám Phá Thế Giới Kiến Thức với Neu Books</h3>
      <p>Hòa mình vào niềm vui của việc đọc với bộ sưu tập sách tuyển chọn của chúng tôi tại Neu Books. Đắm chìm trong những câu chuyện hấp dẫn, mở rộng tầm nhìn, và bắt đầu những cuộc phiêu lưu văn học ngay từ sự thoải mái của ngôi nhà của bạn.</p>
      <a href="about.php" class="white-btn">Khám Phá Thêm</a>
   </div>

</section>



<section class="products">

   <h1 class="title">Sản phẩm mới nhất</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <div class="price">VND<?php echo $fetch_products['price']; ?></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">See more</a>
   </div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/book_banner.jpg" alt="">
      </div>

      <div class="content">
         <h3>Về Chúng Tôi</h3>
         <p>Chúng tôi là Neu Books - nơi kết nối cộng đồng yêu sách. Tại đây, chúng tôi cam kết mang đến cho bạn những trải nghiệm đọc sách tuyệt vời nhất. Hãy khám phá về chúng tôi và sứ mệnh của mình trong việc lan tỏa niềm đam mê về sách.</p>
         <a href="about.php" class="btn">Đọc Thêm</a>
      </div>


   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>Bạn có câu hỏi nào không?</h3>
      <a href="contact.php" class="white-btn">Liên Hệ Chúng Tôi</a>
   </div>


</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
