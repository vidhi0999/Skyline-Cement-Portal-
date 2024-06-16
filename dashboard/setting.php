<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <?php include('header.php'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- My CSS -->
    <script src="../js/sweetalert.min.js"></script>
    <?php
    $username = $_SESSION['username'];

    // Assuming you have established a database connection ($conn)
    $sql = $conn->query("SELECT * from users where username='$username'");
    $row = $sql->fetch_assoc();
    ?>
</head>

<!-- CONTENT -->
<section id="content">
    <!-- MAIN -->
    <main>
        <div class="dashboard" style="color:var(--dark)">
            <br>
            <div class="head-title">
                <div class="left">
                    <h2>Manage Profile</h2>
                </div>
                <br>
            </div>
            <hr>

            <div class="insights">
                <div class="sales"
                    style="padding:40px;background:linear-gradient(#cfe8ff,#6379b5);max-width:80%;margin:auto;">

                    <form method="post" action="../dashboard/setting.php" enctype="multipart/form-data">

                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Full Name</span>
                                <input type="text" name="fullname" placeholder="Enter your name" required
                                    value="<?php echo $row['fullname']; ?>" />
                            </div>
                            <div class="input-box">
                                <span class="details">Username</span>
                                <input type="text" name="username" placeholder="Enter your username" required
                                    value="<?php echo $row['username']; ?>" />
                            </div>
                            <div class="input-box">
                                <span class="details">Email</span>
                                <input type="email" name="email" placeholder="Enter your email" required
                                    value="<?php echo $row['email']; ?>" />
                            </div>
                            <div class="input-box">
                                <span class="details">Phone Number</span>
                                <input type="number" name="phone" placeholder="Enter your number" required
                                    value="<?php echo $row['phonenumber']; ?>" />
                            </div>

                            <div class="input-box">
                                <span class="details">Years of experience</span>
                                <div class="select-wrapper">
                                    <select name="experience" id="experience" required>
                                         <option value="0" <?php echo $row['experience'] == 0 ? 'selected' : '' ?>> less
                                            than 1 year
                                        </option>
                                        <option value="1" <?php echo $row['experience'] == 1 ? 'selected' : '' ?>> 1 year
                                        </option>
                                        <option value="2" <?php echo $row['experience'] == 2 ? 'selected' : '' ?>>
                                            2 years
                                        </option>
                                        <option value="3" <?php echo $row['experience'] == 3 ? 'selected' : '' ?>> 3 years
                                        </option>
                                        <option value="4" <?php echo $row['experience'] == 4 ? 'selected' : '' ?>> 4 years
                                        </option>
                                        <option value="5" <?php echo $row['experience'] == 5 ? 'selected' : '' ?>> 5 years
                                        </option>
                                        <option value="6" <?php echo $row['experience'] == 6 ? 'selected' : '' ?>> 6 years
                                            or more
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="input-box">
                                <span class="details">Designation</span>
                                <input type="text" name="designation" placeholder="Enter your designation" required
                                    value="<?php echo $row['designation']; ?>" />
                            </div>
                        </div>

                        <div class="gender-details">
                            <input type="radio" name="gender" value="Male" id="dot-1"
                                <?php if ($row['gender'] == "Male") echo "checked"; ?> />
                            <input type="radio" name="gender" value="Female" id="dot-2"
                                <?php if ($row['gender'] == "Female") echo "checked"; ?> />

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

                        <!-- <div class="image-upload">
                            Select image to upload:
                            <input type="file" name="file" id="file" required>
                        </div> -->

                        <div class="button">
                            <input type="submit" name="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</section>

<?php
if (isset($_POST["submit"])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];
    $experience = $_POST['experience'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    // File upload path
    $targetDir = "../images/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if image file is a valid image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        // Allow certain file formats
        $allowTypes = array('jpg', 'jpeg', 'png', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // Assuming you have established a database connection ($conn)
                $updateQuery = "UPDATE users SET fullname = '$fullname', username='$username', email='$email', designation='$designation', experience='$experience', phonenumber='$phone', gender='$gender', filename='$fileName' WHERE username='$username'";

                if ($conn->query($updateQuery) === TRUE) {
                    header('Location: ../dashboard/setting.php');?>
                    <script>window.location.href = "../dashboard/setting.php";</script>
                 <?php   exit(); // Important to prevent further execution
                } else {
                    // Handle database error
                    echo "Database error: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    } else {
        echo 'Please select a valid image file.';
    }
}
?>
</html>

