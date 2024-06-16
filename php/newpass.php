<?php
session_start();

include('header.php');

if (isset($_POST['submit'])) {

    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    if ($pass !== $cpass) {
        header("location:newpass.php?error=Enter same password");
    } else {
        $sql = "UPDATE users SET pass = '$pass' WHERE email = '$email'";
        if ($conn->query($sql) === TRUE) {
            header("location:signup.php?error1=Password reseted successfully");
        } else {
            header("location:newpass.php?error=Error");
        }
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
            <header>New Password</header>

            <div class="content2">
                <form action="newpass.php" method="POST">
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
                            <i class="fas fa-lock"></i>
                            <input type="password" name="pass" placeholder="Password" required />
                        </div>
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="cpass" placeholder="Confirm Password" required />
                        </div>


                    </div>

                    <div class="button">
                        <input type="submit" name='submit' value="RESET" />
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>