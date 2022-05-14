<?php
// To include config file which connects to database
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Customers</title>
  <link rel="stylesheet" href="./Styles/customers.css">

  <!-- To use bootrstrap in the page -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.0/dist/bootstrap-table.min.css" />
  <!-- To change title icon -->
  <link rel='shortcut icon' type='image/x-icon' href='Images/bank.png' />

  <!-- To stop showing stop war messages -->
  <style type="text/css">
    .disclaimer {
      display: none;
    }
  </style>
</head>

<body>
  <!-- To include the navbar at the top of the page -->
  <?php include 'navbar.php' ?>
  
  <!-- To include the title of the table -->
  <h1 class="title-cust">Here is a list of all customers</h1>
  <br />
  
  <!-- To include the table -->
  <div style="padding:50px">
    <table class="table table-striped">
      <thead>
        <tr>
          <!-- Here are the table headers -->
          <th scope="col">Username</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Birth Date</th>
          <th scope="col">Current Balance</th>
          <th scope="col">Transfer</th>
        </tr>
      </thead>
      <tbody>
      <tbody>
        <!-- Here we use data from database to make rows at the table -->
        <?php
        // Here we get all the users
        $sql = "SELECT * FROM Users";
        $result = mysqli_query($conn, $sql);
        
        // Then we while loop upon each item in the table users
        while ($row = $result->fetch_assoc()) {
          // Then we make a specified row to him/her
          echo "
	            <tr>
                    <td scope='row'>" . $row['Username'] . "</td>
                    <td>" . $row['Name'] . "</td>
                    <td>" . $row['Email'] . "</td>
                    <td>" . $row['Birth Date'] . "</td>
                    <td>" . $row['Current Balance'] . " EGP</td>
                    <td><a class='button' href='transfers.php?username=" . $row['Username'] . "' id=" . $row['Username'] . ">Transfer</a></td>
                </tr>
	            ";
        }
        ?>

      </tbody>
    </table>
  </div>
  
  <!-- To include the footer at the bottom of the page -->
  <?php include 'footer.php' ?>
  
  <!-- To use bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-table@1.20.0/dist/bootstrap-table.min.js"></script>
  
  <!-- This script to make all customers anchor in navbar active -->
  <script>
    var cust = document.getElementById('cust');
    cust.classList.add("active");
  </script>
  
</body>
</html>