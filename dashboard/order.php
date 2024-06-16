<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<?php include('header.php') ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- My CSS -->
<script src="../js/sweetalert.min.js"></script>


<!-- CONTENT -->
<section id="content">
    <!-- MAIN -->
    <main>
        <div class="dashboard" style="color:var(--dark)">
            <br>
            <div class=" head-title">
                <div class="left">
                    <h2>Recent Orders</h2>
                </div>
                <br>

                <button type="button" class="btn" data-toggle="modal" data-target="#form"
                    style="color:var(--dark);background:var(--light-blue);padding:10px;border-radius:10px">
                    <div class="right-plus" data-toggle="modal" data-target="#form">
                        <i class=" fa fa-shopping-cart"></i> Place Orders
                    </div>
                </button>

                <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <h2 class="modal-title">NEW ORDERS</h2>



                            <form action="../order/placeOrder.php" method="POST" enctype="multipart/form-data">
                                <br>
                                <hr style="margin-top:10px;margin-bottom:30px;background:#000839">

                                <div class="form-group">
                                    <label for="tradeNumber">Trade Number(9 digits)</label>
                                    <div class="select-wrapper">
                                        <select name="trade_number" id="trade_number">
                                            <option value="#">-- Select Trade Number --</option>
                                            <?php
                                            $sql = "SELECT * from retailers where  delete_flag=0";
                                            $gotResults = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($gotResults)) {
                                                echo '<option value="' . $row['retailer_id'] . '"> ' . $row['trade_No'] . '</option>';
                                            }
                                            if (mysqli_num_rows($gotResults) == 0) {
                                                echo "<option value='#'>No Trade Number Found</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="productType">Product Type</label>
                                    <div class="select-wrapper">
                                        <select name="product_type" id="productType" required>
                                            <option value="">Select product type</option>
                                            <option value="WeatherPlus">WeatherPlus</option>
                                            <option value="Super LM">Super LM</option>
                                            <option value="PPC">PPC</option>
                                            <option value="OPC-53">OPC-53</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="shipTo">Ship To</label>
                                    <div class="select-wrapper">
                                        <select name="ship_to" id="shipTo" required>
                                            <option value="">Select destination</option>
                                            <option value="Adajan">Adajan</option>
                                            <option value="Varachha">Varachha</option>
                                            <option value="Athwa">Athwa</option>
                                            <option value="Parle Point">Parle Point</option>
                                            <option value="Vesu">Vesu</option>
                                            <option value="Katargam">Katargam</option>
                                            <option value="Dumas Road">Dumas Road</option>
                                            <option value="Piplod">Piplod</option>
                                            <option value="Bhatar">Bhatar</option>
                                            <option value="Rander">Rander</option>
                                            <option value="Udhna">Udhna</option>
                                            <option value="Nanpura">Nanpura</option>
                                            <option value="Ghod Dod Road">Ghod Dod Road</option>
                                            <option value="Limbayat">Limbayat</option>
                                            <option value="Amroli">Amroli</option>
                                            <!-- Add more options for Surat areas -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="deliveryDate">Delivery Date</label>
                                    <input type="date" name="delivery_date" class="form-control" id="deliveryDate"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="deliveryTime">Delivery Time Slot</label>
                                    <div class="select-wrapper">
                                        <select name="delivery_time_slot" id="deliveryTime" required>
                                            <option value="">Select time slot</option>
                                            <option value="09:00 AM - 10:00 AM">09:00 AM - 10:00 AM</option>
                                            <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                            <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                                            <option value="12:00 PM - 01:00 PM">12:00 PM - 01:00 PM</option>
                                            <option value="01:00 PM - 02:00 PM">01:00 PM - 02:00 PM</option>
                                            <option value="02:00 PM - 03:00 PM">02:00 PM - 03:00 PM</option>
                                            <option value="03:00 PM - 04:00 PM">03:00 PM - 04:00 PM</option>
                                            <option value="04:00 PM - 05:00 PM">04:00 PM - 05:00 PM</option>
                                            <option value="05:00 PM - 06:00 PM">05:00 PM - 06:00 PM</option>
                                            <option value="06:00 PM - 07:00 PM">06:00 PM - 07:00 PM</option>
                                            <option value="07:00 PM - 08:00 PM">07:00 PM - 08:00 PM</option>
                                            <option value="08:00 PM - 09:00 PM">08:00 PM - 09:00 PM</option>
                                            <!-- Add more time slot options if needed -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="vehicleType">Type of Vehicle</label>
                                    <div class="select-wrapper">
                                        <select name="vehicle_type" id="vehicleType" required>
                                            <option value="">Select vehicle type</option>
                                            <option value="Tempo">Tempo</option>
                                            <option value="Ultra Vehicle">Ultra Vehicle</option>
                                            <option value="Self">Self</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" name="submit_order" class="btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>



            <div class="table-data">
                <div class="order">
                    <table>
                        <thead>


                            <tr>
                                <th>#</th>
                                <th>Company</th>
                                <th>Product Type</th>
                                <th>Ship To</th>
                                <th>Delivery Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $qry = $conn->query("SELECT o.*, trade_No,company_name,contact_no  from `orders` o inner join `retailers` r on o.retailer_id = r.retailer_id where o.delete_flag = 0 and r.delete_flag=0  order by o.`order_id` asc");
                            while ($row = $qry->fetch_assoc()):
                                ?>
                                <tr>

                                    <td>
                                        <?php echo $i++; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['company_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['product_type'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['ship_to'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['delivery_date'] ?>
                                    </td>
                                    <td>
                                        <?php if ($row['Status'] == 2): ?>
                                            <span class="status completed">Dispatched</span>

                                        <?php elseif ($row['Status'] == 1): ?>

                                            <span class="status process">On Going</span></a>
                                        <?php elseif ($row['Status'] == 0): ?>

                                            <span class="status pending">Pending</span></a>
                                        <?php endif; ?>
                                    </td>


                                    <td>
                                        <div class="icons">
                                            <button class="view" class="btn" title="View" id="view" data-toggle="modal"
                                                type="button" data-id="<?php echo $row['order_id'] ?>" data-target=" #view"
                                                style="border:none; background-color:inherit">
                                                <a href="../order/viewOrder.php?id=<?php
                                                echo $row['order_id'];
                                                ?>">
                                                    <i style=" padding: 0.100rem 0.10rem;" class="fa fa-eye"></i>
                                                </a>
                                            </button>

                                        </div>

                                        <!-- <div class="icons">
                                            <button class="edit" class="btn" title="edit" id="edit" data-toggle="modal"
                                                type="button" data-id="" style="border:none; background-color:inherit">
                                                <i style=" padding: 0.100rem 0.10rem;" class="fa fa-edit"></i>
                                            </button>
                                        </div> -->



                                        <div class="icons">
                                            <form method="POST">
                                                <input type="text" name="delete" value="<?php echo $row['order_id'] ?>"
                                                    hidden>
                                                <button class="btn" title="Accept" data-id="<?php echo $row['order_id']; ?>"
                                                    data-target=" #view" name="delete1">
                                                    <i style=" padding: 0.100rem 0.10rem; color:#e34724;"
                                                        class="fa fa-trash"></i>

                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>


<?php
if (isset($_POST['delete1'])) {
    $id = $_POST['delete'];
    $sql = "UPDATE orders SET delete_flag = '1' WHERE order_id='$id'";
    $result1 = $conn->query($sql);
    if ($result1) {
        echo "<script>
                swal({
                    title: 'Success!',
                    text: 'Order Deleted!',
                    icon: 'success',
                    button: 'Ok',
                }).then(function() {
                    window.location = 'order.php';
                });
                </script>";
    } else {
        echo "<script>
                swal({
                    title: 'Error!',
                    text: 'Something went wrong!',
                    icon: 'error',
                    button: 'Ok',
                }).then(function() {
                    window.location = 'order.php';
                });
                </script>";
    }
}
?>