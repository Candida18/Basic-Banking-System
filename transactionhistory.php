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
            <b><br /><br />Transaction History</b>
          </h2>
        </div>
        <table class="table">
          <tr>
            <th>Sr. No</th>
            <th>Sender</th>
            <th>Recipient</th>
            <th>Transferred Amount</th>
            <th>Timestamp</th>
          </tr>
          <?php

            include './connection.php';

            $sql = "SELECT * from transaction";

            $query = mysqli_query($conn, $sql);

            while ($rows = mysqli_fetch_assoc($query)) {
            ?>
         <tr>
            <td ><?php echo $rows['sr_no']; ?></td>
            <td ><?php echo $rows['sender']; ?></td>
            <td ><?php echo $rows['receiver']; ?></td>
            <td ><i class="fa fa-inr"></i>&nbsp;<?php echo $rows['transferred_amount']; ?> </td>
            <td ><?php echo $rows['date_time']; ?> </td>

                        <?php
                    }
                    mysqli_close($conn);
                        ?>


          
 

        </table>
      </div>
    </section>
    <script src="blogs/js/jquery.min.js"></script>
    <script src="blogs/bootstrap/js/bootstrap.min.js"></script>
    <script src="blogs/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="blogs/js/theme.js"></script>
  </body>
  <br>
  <footer class="page-footer">
  <div class="container">
    <div class="links">
      <a href="https://www.thesparksfoundationsingapore.org/">About Us</a><a href="https://www.thesparksfoundationsingapore.org/">Contact Us</a><a href="https://www.thesparksfoundationsingapore.org/">Services</a>
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
