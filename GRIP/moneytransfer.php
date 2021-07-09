<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Banking System</title>
  <link rel="shortcut icon" href="https://www.thesparksfoundationsingapore.org/images/logo_small.png" type="image/png">
  <link rel="stylesheet" href="blogs/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700" />
  <link rel="stylesheet" href="blogs/fonts/font-awesome.min.css" />
  <link rel="stylesheet" href="blogs/fonts/ionicons.min.css" />
  <link rel="stylesheet" href="blogs/css/Article-List.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css" />
</head>

  <body>
    <?php
    include './connection.php';
    $sql = "SELECT * FROM clients";
    $result = mysqli_query($conn, $sql);
    ?>
  <nav class="
        navbar navbar-dark navbar-expand-lg
        fixed-top
        bg-white
        portfolio-navbar
        gradient
      ">
    <div class="container">
      <a href="https://www.thesparksfoundationsingapore.org/">
        <img src="https://www.thesparksfoundationsingapore.org/images/logo_small.png" style="height: 60px">
      </a>
      <button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="https://www.thesparksfoundationsingapore.org/">About Us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="moneytransfer.php">Customers</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="transactionhistory.php">Transactions</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <section class="article-list">
      <div class="container">
        <div class="intro">
          <h2 class="text-center">
            <b><br /><br />Money Transfer</b>
          </h2>
        </div>
        <table class="table">
          <tr>
            <th>Customer Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Bank Balance</th>
            <th>Perform Transactions</th>
          </tr>
          <?php
            if (isset($result)) {
              while ($rows = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td>
              <?php echo (isset($rows['c_id']) ? $rows['c_id'] : ''); ?>
            </td>
            <td>
              <?php echo (isset($rows['c_name']) ? $rows['c_name'] : ''); ?>
            </td>
            <td>
              <?php echo (isset($rows['c_mail']) ? $rows['c_mail'] : ''); ?>
            </td>
            <td>
            <i class="fa fa-inr"></i>&nbsp;<?php echo (isset($rows['c_balance']) ? $rows['c_balance'] : ''); ?>
            </td>
            <td>
              <a href="process.php?c_id=<?php echo $rows['c_id']; ?>"> 
              <button class="button" data-bss-hover-animate="pulse">Transfer Money &emsp;<i class="fa fa-inr"></i></button></a>
            </td>

            </td>
          </tr>
        <?php
            }
        }
        ?>
        </table>
      </div>
    </section>
    <script src="blogs/js/jquery.min.js"></script>
 
    <script src="blogs/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="blogs/js/theme.js"></script>
  </body>
  <br>

  <footer class="page-footer">
  <div class="container">

    <div class="links">
      <a href="https://www.thesparksfoundationsingapore.org/">About Us</a>
      <a href="https://www.thesparksfoundationsingapore.org/">Contact Us</a>
      <a href="https://www.thesparksfoundationsingapore.org/">Services</a>
    </div>

    <div class="social-icons">
      <a href="https://www.facebook.com/thesparksfoundation.info" style="background-color: black">
        <i class="icon ion-social-facebook"></i>
      </a>
      
      <a href="https://instagram.com/thesparksfoundation.info" style="background-color: black">
        <i class="icon ion-social-instagram-outline"></i>
      </a>
      <a href="https://twitter.com/tsfsingapore" style="background-color: black">
        <i class="icon ion-social-twitter"></i>
      </a>
    </div>

  </div>
</footer>
</html>
