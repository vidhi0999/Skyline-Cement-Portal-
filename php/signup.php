<?php
session_start();
include_once('../database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Login & Signup Form</title>
    <link rel="stylesheet" href="../css/signup.css" />
</head>

<body>

    <div class="header">
        <div class="logo">
            <img src="../images/logo.jpg" alt="">
            <!-- <div class="line"></div> -->
            <p>Skyline Portal</p>
        </div>
        <div class="logo-space">
        </div>
    </div>

    <div class="main">
        <!-- <section class="wrapper"> -->
        <div class="wrapper">

            <div class="form signup">
                <header>Signup</header>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="error">
                        <div class="sub-error">
                            <h4>
                                <?php echo $_GET['error']; ?>
                            </h4>
                        </div>
                    </div>
                <?php } ?>

                <div class="content">
                    <form method="Post">
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
</body>

</html>