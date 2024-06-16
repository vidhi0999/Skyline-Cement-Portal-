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
                    <h3>Edit Order</h3>
                </div>
                <hr>
            </div>

            <div class="row mt-n5 justify-content-center">
                <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
                    <div class="card card-outline card-primary rounded-0 shadow">
                        <div class="card-body">

                            <div class="container-fluid">
                                <form action="../order/placeOrder.php" method="POST" enctype="multipart/form-data">

                                    <input type="hidden" name="order_id" value="<?php echo $row1['order_id'] ?>">
                                    <input type="hidden" name="retailer_id" value="<?php echo $row1['retailer_id'] ?>">

                                    <div class="form-group">
                                        <label for="" class="control-label"> Company Name </label>
                                        <div class="input-group input-group-sm align-items-end">
                                            <input type="text"
                                                class="form-control form-control-sm form-control-border rounded-0"
                                                id="name" name="Company name"
                                                value="<?php echo $row2['company_name'] ?>" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="productType">Product Type</label>
                                        <div class="select-wrapper">
                                            <select name="product_type" id="productType" required>
                                                <?php
                                                $productTypes = ["WeatherPlus", "Super LM", "PPC", "OPC-53"];

                                                foreach ($productTypes as $productType) {
                                                    echo '<option value="' . $productType . '" ' . ($row1['product_type'] == $productType ? 'selected' : '') . '>' . $productType . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="shipTo">Ship To</label>
                                        <div class="select-wrapper">
                                            <select name="ship_to" id="shipTo" required>
                                                <?php
                                                $options = [
                                                    "Varachha",
                                                    "Athwa",
                                                    "Parle Point",
                                                    "Vesu",
                                                    "Katargam",
                                                    "Dumas Road",
                                                    "Piplod",
                                                    "Bhatar",
                                                    "Rander",
                                                    "Udhna",
                                                    "Nanpura",
                                                    "Ghod Dod Road",
                                                    "Limbayat",
                                                    "Amroli"
                                                ];

                                                foreach ($options as $option) {
                                                    echo '<option value="' . $option . '" ' . ($row1['ship_to'] == $option ? 'selected' : '') . '>' . $option . '</option>';
                                                }
                                                ?>
                                            </select>

                                            <!-- Add more options for Surat areas -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="deliveryDate">Delivery Date</label>
                                        <input type="date" name="delivery_date" class="form-control" id="deliveryDate"
                                            required
                                            value="<?php echo isset($row1['delivery_date']) ? $row1['delivery_date'] : ''; ?>">
                                    </div>


                                    <div class="form-group">
                                        <label for="deliveryTime">Delivery Time Slot</label>
                                        <div class="select-wrapper">
                                            <select name="delivery_time_slot" id="deliveryTime" required>
                                                <option value="">Select time slot</option>
                                                <?php
                                                $timeSlots = [
                                                    "09:00 AM - 10:00 AM",
                                                    "10:00 AM - 11:00 AM",
                                                    "11:00 AM - 12:00 PM",
                                                    "12:00 PM - 01:00 PM",
                                                    "01:00 PM - 02:00 PM",
                                                    "02:00 PM - 03:00 PM",
                                                    "03:00 PM - 04:00 PM",
                                                    "04:00 PM - 05:00 PM",
                                                    "05:00 PM - 06:00 PM",
                                                    "06:00 PM - 07:00 PM",
                                                    "07:00 PM - 08:00 PM",
                                                    "08:00 PM - 09:00 PM"
                                                    // Add more time slot options if needed
                                                ];

                                                foreach ($timeSlots as $slot) {
                                                    echo '<option value="' . $slot . '" ' . ($row1['delivery_time_slot'] == $slot ? 'selected' : '') . '>' . $slot . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="vehicleType">Type of Vehicle</label>
                                        <div class="select-wrapper">
                                            <select name="vehicle_type" id="vehicleType" required>
                                                <option value="">Select vehicle type</option>
                                                <option value="Tempo" <?php echo $row1['vehicle_type'] == 'Tempo' ? 'selected' : ''; ?>>
                                                    Tempo
                                                </option>
                                                <option value="Ultra Vehicle" <?php echo $row1['vehicle_type'] == 'Ultra Vehicle' ? 'selected' : ''; ?>>
                                                    Ultra Vehicle
                                                </option>
                                                <option value="Self" <?php echo $row1['vehicle_type'] == 'Self' ? 'selected' : ''; ?>>
                                                    Self
                                                </option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="card-footer py-1 text-center">
                                        <button name="save" class="btn btn-primary btn-flat btn-sm bg-gradient-primary"
                                            id="save">
                                            <i class="fa fa-save"> </i>
                                            Save
                                        </button>

                                        <a class="btn btn-light btn-flat bg-gradient-light border btn-sm"
                                            href="../dashboard/order.php?"><i class="fa fa-times"></i>
                                            Cancel</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>