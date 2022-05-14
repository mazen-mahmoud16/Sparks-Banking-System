<?php 
// To include file config which connects to server database
include 'config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="./Styles/index.css">
  <!-- To stop showing stop war messages -->
  <style type="text/css">.disclaimer { display: none; }</style>
  <!-- To change icon of the title -->
  <link rel='shortcut icon' type='image/x-icon' href='Images/bank.png' />
</head>
<body>
    <!-- To include the navbar at the top of the page -->
    <?php include 'navbar.php' ?>
  
    <!-- To include the auto sliding images in the page -->
    <div class="Animation">
      <div class="contentt">
        <p class="textAnimation">
          Discover our best Banking Website
        </p>
      </div>
    </div>
    
    <!-- To include the footer at the bottom of the page -->
    <?php include 'footer.php' ?>
    
    <!-- Script to make home button in the navbar class active -->
    <script>
        var home = document.getElementById('home');
        home.classList.add("active");
    </script>
    
</body>
</html>