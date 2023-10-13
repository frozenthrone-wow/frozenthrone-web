<?php
include("config/dbconf1.php");
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Frozen Throne</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.min.css">
</head>
<body>
  <header>
    <div class='headwrapper'>
      <a class='server-brand' href='#'>Frozen<span>Throne</span></a>
      <!-- <div class='chat-toggler'>
        <div class='chat-circle'></div>
      </div> -->
    </div>
    <!-- <div class='chat-box'>
      <div class='shoutbox-head'>Shoutbox</div>
      <div class='chat-screen'>
      </div>
      <form action='functions/shoutchat.php' onsubmit="chatSystem('.chat-screen', 'functions/chat.php');" class='chatform' method='POST'>
        <input class='chatinput' name="chatmsg" placeholder='Write a Message and hit Enter...' type='text'>
      </form>
    </div> -->
  </header>
  <div class='wrapper'>
    <div class="slideshow-container">
      <?php
      $stmt = $conn->prepare("SELECT * FROM slider ORDER BY id");
      $stmt->execute();
      $result = $stmt->get_result();
      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<div class='mySlides fade'><img src='images/slider/".$row['img_name']."' style='width:100%;' alt='img'><div class='text'>".$row['caption']."</div></div>";
        }
      }
      ?>
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
      <div class="dots" style="text-align:center">
        <?php
        $incr = 0;
        $stmt = $conn->prepare("SELECT * FROM slider ORDER BY id");
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $incr++;
            echo "<span class='dot' onclick='currentSlide($incr)'></span>";
          }
        }
        ?>
      </div>
    </div>
    <div class="realmlistbox"> <code>SET realmlist "<?php echo $realmlisthost; ?>"</code></div>
    <div class='content'>
      <div class='container'>
        <div class='box-head'>CREATE ACCOUNT</div>
        <div class='box-body'>
          <form action='functions/register.php' method='POST' class="myForm" autocomplete="off">
            <div class="output"></div>
            <div class='form-group'>
              <label for='user'>Username:</label>
              <input id='user' type='text' name="username">
            </div>
            <div class='form-group'>
              <label for='pass'>Password:</label>
              <input id='pass' type='password' name="password" onfocus="this.removeAttribute('readonly');" readonly>
            </div>
            <div class='form-group'>
              <label for='cpass'>Confirm Password:</label>
              <input id='cpass' type='password' name="cpassword" onfocus="this.removeAttribute('readonly');" readonly>
            </div>
            <div class='form-group'>
              <label for='email'>Email: (can be fake. no check implemented)</label>
              <input id='email' type='email' name="email">
            </div>
            <input class='btn btn-default' type='submit' value='register'>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src='https://kit.fontawesome.com/bb321b0a44.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src="js/script.js"></script>
  <script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides((slideIndex += n));
  }

  function currentSlide(n) {
    showSlides((slideIndex = n));
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
      slideIndex = 1;
    }
    if (n < 1) {
      slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
  }

  setInterval(function () {
    plusSlides(1);
  }, 5000);

  </script>
</body>
</html>
