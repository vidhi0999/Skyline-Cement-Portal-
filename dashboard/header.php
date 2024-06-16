<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>SKYLINE</title>
</head>


<?php
include("../database.php");
session_start();
$username = $_SESSION['username'];
if (empty($username)) {
    header("location:../php/signup.php");
}
$sql = "SELECT * from users where username='$username'";
$gotResults = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($gotResults);


?>

<body>


    <!-- SIDEBAR -->

    <section id="sidebar">

        <div class="aside">
            <div class="logo">
                <img src="../images/logo.jpg" alt="">
                <div class="line"></div>
                <p style="margin-bottom:0"> Skyline Portal</p>

            </div>
        </div>

        <ul class="side-menu top">

            <li>
                <a href="../dashboard/dashboard.php">
                    <i class='fa fa-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="../dashboard/order.php">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="text">Orders</span>
                </a>
            </li>

            <li>
                <a href="../dashboard/sales.php">
                    <i class="fa fa-bar-chart"></i>
                    <span class="text">Sales</span>
                </a>
            </li>

            <li>
                <a href="../dashboard/network.php">
                    <i class='fa fa-users'></i>
                    <span class="text">My Network</span>
                </a>
            </li>

            <!-- <li>
                <a href="../dashboard/message.php">
                    <i class='fa fa-envelope'></i>
                    <span class="text">Message</span>
                </a>
            </li> -->

        </ul>
        <ul class="side-menu">
            <li>
                <a href="../dashboard/setting.php">
                    <i class='fa fa-gear'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="../php/logout.php" class="logout">
                    <i class="fa fa-sign-out"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='fa fa-bars'></i>

            <form action="#">
                <div class="form-input">
                    <!-- SKYLINE Portal -->
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <!-- <input type="checkbox" id="switch-mode" hidden> -->
            <!-- <label for="switch-mode" class="switch-mode"
                style="margin-bottom:0;line-height:0;vertical-align:unset;"></label> -->
            <p style="font-size:15px;color:var(--dark);margin-bottom:0;line-height:0">
                <?php echo $row['username']; ?>
            </p>
            <!-- <a href=" #" class="profile">

                <?php
                if ($row['filename'] == "") {
                    ?>
                    <img src="../images/default.png">
                    <?php
                } else {
                    ?>
                    <img src='../images/<?php echo $row['filename']; ?>'>
                    <?php
                }
                ?>

            </a> -->
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->

    </section>
    <!-- CONTENT -->


    <script src="../js/script.js"></script>
</body>

</html>