<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    include("../dashboard/header.php");

    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $order_id = $_GET['id'];
        $sql1 = $conn->query("SELECT * FROM orders WHERE order_id = '$order_id'");
        $row1 = $sql1->fetch_assoc();

        $retailer_id = $row1['retailer_id'];
        $sql2 = $conn->query("SELECT * FROM retailers WHERE retailer_id = $retailer_id");
        $row2 = $sql2->fetch_assoc();
    } ?>


</head>


<section id="content">

    <!-- MAIN -->
    <main>

        <div class="dashboard">
            <div class="head-title" style="color:var(--dark)">
                <div class="left">
                    <h3>Order Details</h3>
                </div>
                <hr>
            </div>
        </div>

        <section class="product">
            <div class="product__photo">
                <div class="photo-container">
                    <img src="../images/company/<?php echo $row2["company_logo"] ?>">
                </div>
            </div>

            <div class="product__info">

                <div class="form-group">
                    <label for="" class="control-label text-muted">Company Name</label>
                    <div class="pl-4 font-weight-bolder">
                        <?php echo $row2['company_name'] ?>
                    </div>
                </div>


                <div class="form-group">
                    <label for="dob" class="control-label text-muted">Product
                        Type</label>
                    <div class="pl-4 font-weight-bolder">
                        <?php echo $row1['product_type'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="gender" class="control-label text-muted">Ship to</label>
                    <div class="pl-4 font-weight-bolder">
                        <?php echo $row1['ship_to'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label text-muted">Delivery
                        Date</label>
                    <div class="pl-4 font-weight-bolder">
                        <?php echo $row1['delivery_date'] ?>
                    </div>
                </div>


                <div class="form-group">
                    <label for="contact" class="control-label text-muted">Delivery Time
                        Slot</label>
                    <div class="pl-4 font-weight-bolder">
                        <?php echo $row1['delivery_time_slot'] ?>
                    </div>
                </div>


                <div class="form-group">
                    <label for="address" class="control-label text-muted">Vehicle
                        Type</label>
                    <div class="pl-4 font-weight-bolder">
                        <?php echo $row1['vehicle_type'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="specialty" class="control-label text-muted">Company
                        Address</label>
                    <div class="pl-4 font-weight-bolder">
                        <?php echo $row2['address'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="control-label text-muted">Contact
                        Number</label>
                    <div class="pl-4 font-weight-bolder">
                        <?php echo $row2['contact_no'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="control-label text-muted">Status</label>
                    <div class="pl-4">
                        <?php if ($row1['Status'] == 2): ?>
                            <span class="status completed">Dispatched</span>
                        <?php elseif ($row1['Status'] == 1): ?>
                            <span class="status process">On Going</span>
                        <?php elseif ($row1['Status'] == 0): ?>
                            <span class="status pending">Pending</span>
                        <?php endif; ?>
                    </div>
                </div>

                <hr style="height:1px;margin-bottom:20px;margin-top:10px;width:90%">

                <a class="btn btn btn-flat bg-gradient-green btn-sm"
                    href="../order/EditOrder.php?id=<?php echo $order_id ?>"><i class="fa fa-edit"></i>
                    Edit</a>

                <button id="update_status" class="btn btn-navy btn-flat bg-gradient-navy btn-sm" data-toggle="modal"
                    type="button" data-target="#form" type="button"><i class="fa fa-check-square"></i> Update
                    Status</button>

                <a class="btn btn btn-flat bg-gradient-primary btn-sm" href="../dashboard/order.php"><i
                        class="fa fa-arrow-circle-left"></i>
                    Back</a>
                <!-- <a href="../dashboard/order.php"> <i class="fa fa-arrow-circle-left"></i></a> -->
            </div>
        </section>
    </main>
    <!-- MAIN -->
</section>

<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <?php
        include("../order/updateOrderStatus.php");
        ?>
    </div>
</div>