<?php
// session_start();
include_once('../database.php');
include_once('./signup.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['pass'] === $pass && $row['email'] === $email) {
            $uname = $row['username'];
            $_SESSION['username'] = $uname;
            header("location:../dashboard/dashboard.php");
        } elseif ($row['email'] === $email && $row['pass'] !== $pass) {
            header("location:signup.php?error2=Enter correct password");
        }
    } else {
        header("location:signup.php?error2=You are not registered!!");
    }
}

?>




<div class="form login">
    <header>Login</header>
    <form method="POST" action="login.php" style="gap:30px">

        <div class="input-box">
            <i class="fas fa-envelope"></i>
            <input type="text" name="email" placeholder="Email address" required />
        </div>
        <div class="input-box">
            <i class="fas fa-lock"></i>
            <input type="password" name="pass" placeholder="Password" required />
        </div>
        <div class="form_group" style="padding: 0rem 2.5rem">
            <label>
                <input type="checkbox"> Remember me
            </label>

            <a href="forgotpass.php">Forgot password?</a>
        </div>

        <div class="button">
            <input type="submit" name='login' value="Login" />
        </div>
    </form>
</div>