<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About</title>
  <link rel="stylesheet" href="./Styles/about.css">
  
  <!-- To change title icon -->
  <link rel='shortcut icon' type='image/x-icon' href='Images/bank.png' />

  <!-- To stop showing stop war messages -->
  <style type="text/css">
    .disclaimer {
      display: none;
    }
  </style>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>


</head>

<body>
  <div class="se-pre-con"></div>
  <!-- To include the navbar at the top of the page -->
  <?php include 'navbar.php' ?>
  
  <!-- To display the container that contains the picture and text -->
  <div class="flex">
      
      <!-- To display the photo on the left -->
      <div class="item1">
          <img alt="personal photo" src="/Images/capture.png" class="photo"/>
      </div>
      
      <!-- To display the text on the right -->
      <div class="item2">
          
          <!-- To display the title -->
          <h1 class="about-title">About Me</h1>
          <br/>
          
          <!-- To display the labels and answers -->
          <h3 class="label inline">Name:</h3>
          <h3 class="ans inline">Mazen Mahmoud Abdel Hafeez</h3>
          <br/><br/>
          <h3 class="label inline">Age:</h3>
          <h3 class="ans inline">22</h3>
          <br/><br/>
          <h3 class="label inline">Email:</h3>
          <a href="mailto:mazen.mahmoud.freelancer@gmail.com" class="link">mazen.mahmoud.freelancer@gmail.com</a>
          <br/><br/>
          <h2 class="label job" >Full Stack Software Engineer</h2>
          <br/>
          
          <!-- To display a line to seperate contents above from bottom -->
          <hr/>
          
          <!-- To display the doscial media icons -->
          <h3 class="label center">Follow me on</h3>
          <div class="footcenter">
				<a href="https://www.facebook.com/mazen.mahmoud.568" target="_blank"><img src="../Images/facebook.png" alt="facebook" class="logo"/></a>
				<a href="https://www.instagram.com/mazen.mahmoud16/" target="_blank"><img src="../Images/instagram.png" alt="instagram" class="logo"/></a>
				<a href="https://www.linkedin.com/in/mazen-mahmoud-393143180" target="_blank"><img src="../Images/linkedin.png" alt="linkedin" class="logo"/></a>
				<a href="https://github.com/mazen-mahmoud16" target="_blank"><img src="../Images/github.png" alt="github" class="logo"/></a>
		  </div>
          <br/>
          
          <!-- To display a button to download the CV -->
          <a href="Images/Resume.pdf" class="button" download>Download my CV</a>
      </div>
  </div>
  <br/>
  
  <!-- To include the footer at the bottom of the page -->
  <?php include 'footer.php' ?>
  
  <!-- This script to make all about anchor in navbar active -->
  <script>
    var about = document.getElementById('about');
    about.classList.add("active");
  </script>
  
  <!-- This script to show loading icon 1 second before showing screen -->
  <script>
	// Wait for window load
	$(window).load(function() {
	    setTimeout(function(){ $(".se-pre-con").fadeOut("slow");; }, 1000);
	});
  </script>
</body>

</html>