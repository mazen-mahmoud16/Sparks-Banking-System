<?php
// To include file config which connects to the server database
include 'config.php';

// Here we get from url the username of the user to be transferred from
$url = $_SERVER['REQUEST_URI'];
$components = parse_url($url);
parse_str($components['query'], $params);
$user = $params['username'];

// If button submit which confirms to transfer money is clicked
if (isset($_POST['transfer'])) {

  // Take the content written in the inputs
  $anothername = $_POST['to'];
  $value = $_POST['mon-value'];

  // Checks whether the input field is empty or not
  if ($value) {

    // Get the details of the user whose going to be transfered from
    $sql = "SELECT * FROM Users WHERE Username='$user'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Get the details of the user whose going to be transfered to
    $sql3 = "SELECT * FROM Users WHERE Username='$anothername'";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($result3);

    // If the specified value the user's account can afford
    if ($row['Current Balance'] >= $value) {

      // Update the 2 users current balance
      $sql1 = "UPDATE Users SET `Current Balance` = " . $row['Current Balance'] . "-$value WHERE Username='$user'";
      $sql2 = "UPDATE Users SET `Current Balance` = " . $row3['Current Balance'] . "+$value WHERE Username='$anothername'";
      $result4 = mysqli_query($conn, $sql1);
      $result5 = mysqli_query($conn, $sql2);

      // Insert into table transactions the new transaction made
      $sql4 = "INSERT INTO Transactions VALUES ('$user','$anothername', '$value')";
      $result6 = mysqli_query($conn, $sql4);
      if ($result4 and $result5 and $result6) {
        // If successfull, go to transactions page
        header("Location: transactions.php");
      }
    } else {
      // Prints that the current balance is not enough
      echo '<script>alert("Current balance is not enough")</script>';
    }
  } else {
    // If the value entered is empty
    echo '<script>alert("Please enter the value")</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transfers</title>
  <link rel="stylesheet" href="./Styles/transfers.css">
  
  <!-- To use bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.0/dist/bootstrap-table.min.css">
  
  <!-- To stop showing stop war message -->
  <style type="text/css">
    .disclaimer {
      display: none;
    }
  </style>
  
  <!-- To change the logo of the title -->
  <link rel='shortcut icon' type='image/x-icon' href='Images/bank.png' />
</head>

<body class="transfers">
    
  <!-- To include the navbar at the top of the page -->
  <?php include 'navbar.php' ?>
  
  <!-- To make the table which show the details of the user selected -->
  <div style="padding:50px">
    <table class="table table-striped">
      <thead>
        <tr>
          <!-- Here are the column headers -->
          <th scope="col">Username</th>
          <th scope="col">Name</th>
          <th scope="col">Current Balance</th>
        </tr>
      </thead>
      <tbody>
        <!-- We here get the user from the database and show him/her -->
        <?php
        
        // We get the user from the url parameter
        $url = $_SERVER['REQUEST_URI'];
        $components = parse_url($url);
        parse_str($components['query'], $params);
        $user = $params['username'];
        
        // We get the user details from the database
        $sql = "SELECT * FROM Users WHERE username='$user'";
        $result = mysqli_query($conn, $sql);
        
        // If the user found
        if ($result->num_rows > 0) {
          $row = mysqli_fetch_assoc($result);
          
          // Write a row in the table with the user's details
          echo "
	            <tr>
                    <td>" . $row['Username'] . "</td>
                    <td>" . $row['Name'] . "</td>
                    <td>" . $row['Current Balance'] . " EGP</td>
                </tr>
	            ";
        }
        ?>

    </table>
  </div>
  
  <!-- Here is the form which when submitted goes to the function described before -->
  <form action="" method="POST" class="form">
      
    <!-- Here is the label for the following drop down list -->
    <h3 class="transfer"> Transfer to: </h3>
    <!-- Here is the drop down list which shows the users -->
    <select name="to">
      <!-- Here we get from the database all the users -->
      <?php
      
      // Here we select all the users except the chosen one to be transfered from
      $sql = "SELECT * FROM Users WHERE username!='$user'";
      $result = mysqli_query($conn, $sql);
      
      // Here we loop over them
      while ($row = $result->fetch_assoc()) {
          
        // Append every user to a new option in the drop down list
        echo "
	             <option value=" . $row['Username'] . ">
                    " . $row['Name'] . "
                </option>
	            ";
      }

      ?>
    </select>
    <br />
    
    <!-- Here is the label of the next input -->
    <h3 class="transfer"> Value: </h3>
    
    <!-- Here is the input where the user enters the desired value to be transfered -->
    <input type="number" class="form-control inp-btn" name="mon-value" placeholder="Write here the desired value to be transfered" style="display:inline-block; width:400px" />
    <label>EGP</label>
    <br /><br /><br />
    
    <!-- Here is the button to submit the form -->
    <input type="submit" name="transfer" class="button">

  </form>
  </div>
  <br /><br /><br /><br />
  
  <!-- To include the footer at the bottom of the page -->
  <?php include 'footer.php' ?>
  
  <!-- To use bootstrap in the page -->
  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-table@1.20.0/dist/bootstrap-table.min.js"></script>
  
</body>

</html>