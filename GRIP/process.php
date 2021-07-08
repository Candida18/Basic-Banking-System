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
                    <b><br /><br />Almost There...</b>
                </h2>
            </div>

            <?php
            include './connection.php';
            if (isset($_REQUEST['c_id'])) {
                $sid = $_GET['c_id'];
                $sql = "SELECT * FROM  clients where c_id=$sid";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
                }
                $rows = mysqli_fetch_assoc($result);
            }
            ?>

            <form method="post">
                <table class="table">
                    <tr>
                        <th>Customer Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Bank Balance</th>
                    </tr>
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
                    </tr>

                </table>
        </div>
    </section>


    <div class="container">
        <br><br><br>
        <label for="to">Recipient :</label>
        <select id="to" name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
            include 'config.php';
            $sid = $_REQUEST['c_id'];
            $sql = "SELECT * FROM clients where c_id!=$sid";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Error " . $sql . "<br>" . mysqli_error($conn);
            }
            while ($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['c_id']; ?>">

                    <?php echo $rows['c_name']; ?> &emsp;(Balance:
                    <?php echo $rows['c_balance']; ?> )

                </option>
            <?php
            }
            ?>
    </div>
    </select>
    <br>
    <label for="amount">Amount:</label>
    <input type="number" class="form-control" name="amount" id="amount" required>
    <div class="text-center">
        <br><br>

        <button class="button" name="submit" type="submit" id="myBtn">Transfer Money &emsp;<i class="fa fa-inr"></i></button>
    </div>
    <br>
    </form>
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
<?php
include './connection.php';

if (isset($_POST['submit'])) {

    $from = $_GET['c_id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from clients where c_id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query); // returns array from which the amount is to be transferred.

    // check input of negative value by user
    if (($amount) < 0) {
        echo '<script>';
        echo ' alert("Please enter correct amount.")';  // showing an alert box.
        echo '</script>';
    }

    // check insufficient balance.
    else if ($amount > $sql1['c_balance']) {
        echo '<script>';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }

    // constraint to check zero values
    else if ($amount == 0) {

        echo "<script>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {
        $sql = "SELECT * from clients where c_id=$to";
        $query = mysqli_query($conn, $sql);
        $sql2 = mysqli_fetch_array($query);

        $sender = $sql1['c_name'];
        $receiver = $sql2['c_name'];

        // deducting amount from sender's account
        $newbalance = $sql1['c_balance'] - $amount;
        $sql = "UPDATE clients set c_balance=$newbalance where c_id=$from";
        mysqli_query($conn, $sql);

        // adding amount to reciever's account
        $newbalance = $sql2['c_balance'] + $amount;
        $sql = "UPDATE clients set c_balance=$newbalance where c_id=$to";
        mysqli_query($conn, $sql);


        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction Successful !!');
                                     window.location='transactionhistory.php';
                           </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>