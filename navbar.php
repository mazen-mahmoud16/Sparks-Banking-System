<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Navbar</title>
<!-- To use bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Here is the beginning of the navbar -->
  <div class="m-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Here is the logo and the title of the website at the top left -->
            <a href="#" class="navbar-brand">
                <img src="/Images/bank.png" height="28" alt="CoolBrand" style="display:inline-block">
                <span style="font-size:17px">Welcome to Banko</span>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Here is the navbar links at the top right -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <div class="navbar-nav">
                        <a href="index.php" class="nav-item nav-link" style="font-size:20px;margin-left:20px" id="home">Home</a>
                        <a href="Customers.php" class="nav-item nav-link" style="font-size:20px;margin-left:20px" id="cust">All Customers</a>
                        <a href="transactions.php" class="nav-item nav-link" style="font-size:20px;margin-left:20px" id="trans">All Transactions</a>
                        <a href="about.php" class="nav-item nav-link" style="font-size:20px;margin-left:20px" id="about">About Me</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
  </div>
</body>
</html>