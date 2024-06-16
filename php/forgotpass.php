<?php
session_start();

include('header.php');

if (isset($_POST['submit'])) {
    $_SESSION['email'] = $_POST['email'];
    $email = $_SESSION['email'];
    $_SESSION['username'] = $_POST['uname'];
    $username = $_SESSION['username'];


    $uname2 = $_SESSION['uname'];
    $uname = $_POST['uname'];

    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND username = '$uname'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['username'] === $uname && $row['email'] === $email) {
            header("location:newpass.php");
        }
    } else {
        header("location:forgotpass.php?error=Enter valid details");
    }
}

?>

<div class="main">
    <div class="wrapper2" style="max-width: 500px;
  width: 100%;">


        <div class="form password">
            <!-- <div class="pass-txt"><a href="signup.php" style="color:black"> <i class=" fas fa-arrow-alt-circle-left"
                        style="color:black"></i></i></a>
            </div> -->
            <header>Forgot Password</header>

            <div class="content2">
                <form action="forgotpass.php" method="POST">
                    <div class="ib">
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="error">
                                <div class="sub-error">
                                    <h4>
                                        <?php echo $_GET['error']; ?>
                                    </h4>
                                </div>
                            </div>
                        <?php } ?>
                    </div>


                    <div class="user-details">

                        <div class="input-box">
                            <!-- <i class="fas fa-envelope"></i> -->
                            <input type="email" name="email" placeholder="Email address" required />
                        </div>

                        <div class="input-box">
                            <input type="text" name="uname" placeholder="User name" required />
                        </div>

                    </div>

                    <div class="button">
                        <input type="submit" name='submit' value="NEXT" />
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>