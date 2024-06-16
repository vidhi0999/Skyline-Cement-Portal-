<?php
session_start();
include_once('header.php');
if (isset($_POST['submit'])) {

    $uname2 = $_SESSION['uname'];
    $uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $gender = $_POST['gender'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $sql2 = "SELECT * FROM users WHERE username='$uname'";
    $result2 = mysqli_query($conn, $sql2);
    $result = mysqli_query($conn, $sql);

    if ($pass !== $cpass) {
        header("location:signup.php?error=The confirmation password does not match!");
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname || $row['email'] === $email) {
                header("location:signup.php?error=User already exists");
            }
        } elseif (mysqli_num_rows($result2) > 0) {
            $row = mysqli_fetch_assoc($result2);
            if ($row['username'] === $uname || $row['email'] === $email) {
                header("location:signup.php?error=User already exists");
            }
        } else {
            $sql2 = "INSERT INTO users(fullname,username,email,phonenumber,pass,gender) VALUES('$fname','$uname','$email','$phonenumber','$pass','$gender')";
            if ($conn->query($sql2) === TRUE) {
                header("location:signup.php?error1=Registered successfully");
            } else {
                header("location:signup.php?error=User can not register");
            }
        }
    }
}
?>





<div class="main">
    <!-- <section class="wrapper"> -->
    <div class="wrapper">


        <div class="form signup">
            <header>Signup</header>

            <div class="content">
                <form method="Post">
                    <div class="ib">
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error">
                                <?php echo $_GET['error'];
                        } ?>
                        </p>

                        <?php if (isset($_GET['error1'])) { ?>
                            <p class="error1">
                                <?php echo $_GET['error1'];
                        } ?>
                        </p>
                        <?php if (isset($_GET['error2'])) { ?>
                            <p class="error2">
                                <?php echo $_GET['error2'];
                        } ?>
                        </p>
                    </div>

                    <div class="user-details">
                        <div class="input-box">
                            <input type="text" name="fname" placeholder="Full name" required />
                        </div>
                        <div class="input-box">
                            <input type="text" name="uname" placeholder="User name" required />
                        </div>
                        <div class="input-box">
                            <input type="email" name="email" placeholder="Email address" required />
                        </div>
                        <div class="input-box">
                            <input type="number" name="phonenumber" placeholder="Phone number" required />
                        </div>
                        <div class="input-box">
                            <input type="password" name="pass" placeholder="Password" required />
                        </div>
                        <div class="input-box">
                            <input type="password" name="cpass" placeholder="Confirm Password" required />
                        </div>

                    </div>

                    <div class="gender-details">
                        <input type="radio" name="gender" value="Male" id="dot-1" required>
                        <input type="radio" name="gender" value="Female" id="dot-2" required>
                        <input type="radio" name="gender" id="dot-3">
                        <span class="gender-title">Gender</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Male</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Female</span>
                            </label>
                        </div>
                    </div>

                    <div class="button">
                        <input type="submit" name="submit" value="Sign up">
                    </div>




                </form>

            </div>


            <?php include('../php/login.php') ?>

            <script>
                const wrapper = document.querySelector(".wrapper"),
                    signupHeader = document.querySelector(".signup header"),
                    loginHeader = document.querySelector(".login header");

                loginHeader.addEventListener("click", () => {
                    wrapper.classList.add("active");
                });
                signupHeader.addEventListener("click", () => {
                    wrapper.classList.remove("active");
                });
            </script>
        </div>
    </div>