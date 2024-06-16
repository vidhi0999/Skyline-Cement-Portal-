<html>

<head>
    <script src="../js/sweetalert.min.js"></script>
</head>

</html>
<?php
include_once('../database.php');

if (isset($_POST['submit_order'])) {
    $retailer_id = $_POST['trade_number'];
    $product_type = $_POST['product_type'];
    $ship_to = $_POST['ship_to'];
    $delivery_date = $_POST['delivery_date'];
    $delivery_time_slot = $_POST['delivery_time_slot'];
    $vehicle_type = $_POST['vehicle_type'];
    // $contact_number = $_POST['contact_number'];

    // You can add further validation and processing here based on your requirements

    $CreatedDate = date("Y-m-d");
    $UpdateDate = date("Y-m-d");

    $sql = "INSERT INTO orders(retailer_id,product_type, ship_to, delivery_date, delivery_time_slot, vehicle_type,date_created, date_updated)
            VALUES ('$retailer_id','$product_type', '$ship_to', '$delivery_date', '$delivery_time_slot', '$vehicle_type','$CreatedDate', '$UpdateDate')";
    $result = $conn->query($sql);

    if ($result) {
        // Order was successfully inserted
        echo "<script>
            swal({
                title: 'Success!',
                text: 'Order Placed',
                icon: 'success',
                button: 'Ok',
            }).then(function() {
                window.location = '../dashboard/order.php';
            });
        </script>";
    } else {
        // An error occurred
        echo "<script>
            swal({
                title: 'Error!',
                text: 'Order Not Placed',
                icon: 'error',
                button: 'Ok',
            }).then(function() {
                window.location = '../dashboard/order.php';
            });
        </script>";
    }
}


if (isset($_POST['save'])) {
    $order_id = $_POST['order_id'];
    $retailer_id = $_POST['retailer_id'];
    $product_type = $_POST['product_type'];
    $ship_to = $_POST['ship_to'];
    $delivery_date = $_POST['delivery_date'];
    $delivery_time_slot = $_POST['delivery_time_slot'];
    $vehicle_type = $_POST['vehicle_type'];

    $UpdateDate = date("Y-m-d");

    $sql = "Update orders set product_type = '$product_type', ship_to='$ship_to', delivery_date='$delivery_date', delivery_time_slot= '$delivery_time_slot',
     vehicle_type='$vehicle_type',date_updated='$UpdateDate' where order_id='$order_id'";

    $result = $conn->query($sql);

    if ($result) {
        // Order was successfully inserted
        echo "<script>
            swal({
                title: 'Success!',
                text: 'Order Updated',
                icon: 'success',
                button: 'Ok',
            }).then(function() {
                window.location = '../dashboard/order.php';
            });
        </script>";
    } else {
        // An error occurred
        echo "<script>
            swal({
                title: 'Error!',
                text: 'Order Not Updated',
                icon: 'error',
                button: 'Ok',
            }).then(function() {
                window.location = '../dashboard/order.php';
            });
        </script>";
    }
}

?>