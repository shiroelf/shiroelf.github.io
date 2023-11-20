<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/book_banner.jpg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>"Tại NEU book, chúng tôi không chỉ là nơi bày bán sách - chúng tôi là người hướng dẫn cho những cuộc phiêu lưu văn hóa. Hãy đắm chìm trong không gian nơi mỗi cuốn sách là một cửa sổ mở ra thế giới mới. Đội ngũ đam mê của chúng tôi tận tâm lựa chọn từng cuốn sách, đảm bảo một bộ sưu tập đa dạng phục vụ mọi sở thích và tò mò. Từ các khu đọc sách ấm cúng đến các sự kiện cộng đồng, chúng tôi tạo nên một không gian để tôn vinh niềm yêu thích với văn chương vượt xa giới hạn trang giấy. Hãy lựa chọn chúng tôi để trải nghiệm một không gian phong phú kỳ thú, nơi mỗi lần ghé thăm là một khám phá và mỗi cuốn sách là một câu chuyện đang chờ được chia sẻ."</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>