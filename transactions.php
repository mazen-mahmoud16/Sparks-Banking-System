<?php
// Include file config which connects to server database
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transactions</title>
  <link rel="stylesheet" href="./Styles/transactions.css">
  <!-- To include bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.0/dist/bootstrap-table.min.css">
  
  <!-- To change icon of the title -->
  <link rel='shortcut icon' type='image/x-icon' href='Images/bank.png' />
  
  <!-- To stop showing message stop war -->
  <style type="text/css">
    .disclaimer {
      display: none;
    }
  </style>
</head>

<body>
  <!-- To include navbar at the top of the page -->
  <?php include 'navbar.php' ?>
  
  <!-- To show the title of the table -->
  <h1 class="title-cust">Here is a list of all transactions</h1>
  <br />
  
  <!-- To display the table of transactions -->
  <div style="padding:50px">
    <table class="table table-striped">
      <thead>
        <tr>
          <!-- Here are the table headers -->
          <th scope="col">From</th>
          <th scope="col">To</th>
          <th scope="col">Value</th>
        </tr>
      </thead>
      <tbody>
          
        <!-- Here we get transactions from database and display them as rows in the table -->
        <?php
        
        // We get elements from database
        $sql = "SELECT * FROM Transactions";
        $result = mysqli_query($conn, $sql);
        
        // We loop over each element of them
        while ($row = $result->fetch_assoc()) {
          
          // We make for each item a row in the table
          echo "
	            <tr>
                    <td>" . $row['from'] . "</td>
                    <td>" . $row['to'] . "</td>
                    <td>" . $row['value'] . " EGP</td>
                </tr>
	            ";
        }
        ?>

      </tbody>

    </table>
  </div>
  
  <!-- To include footer at the top of the page -->
  <?php include 'footer.php' ?>
  
</body>

<!-- To use bootstrap in the page -->
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.0/dist/bootstrap-table.min.js"></script>

<!-- To make button all transactions in the navbar active -->
<script>
  var trans = document.getElementById('trans');
  trans.classList.add("active");
</script>

</html>