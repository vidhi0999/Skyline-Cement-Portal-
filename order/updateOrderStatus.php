<!-- <head> -->
<?php
include('../database.php');
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $order_id = $_GET['id'];
    $sql1 = $conn->query("SELECT * FROM orders  WHERE order_id = '$order_id'");
    $row1 = $sql1->fetch_assoc();
}
?>
<!-- </head> -->
<div class="modal-content" style="font-size:15px">
    <h5 class="modal-title"><i class="fa fa-check-square"></i> Update Order Status </h5>

    <hr style="margin-top:10px;margin-bottom:20px;background:#000839">

    <form action="../order/updateOrderStatus.php" method="post">
        <div class="form-group">
            <input type="hidden" name="order_id" value="<?php echo $order_id ?>">

            <label for="status" class="control-label">Status</label>
            <div class="select-wrapper">
                <select name="status" id="status" required>
                    <option value="0" <?php echo $row1['Status'] == 0 ? 'selected' : '' ?>>Pending
                    </option>
                    <option value="1" <?php echo $row1['Status'] == 1 ? 'selected' : '' ?>>On Going
                    </option>
                    <option value="2" <?php echo $row1['Status'] == 2 ? 'selected' : '' ?>>Dispatched</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="submit" id="submit">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    </form>

</div>

</div>

<?php
if (isset($_POST['submit'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $sql = $conn->query("Update orders set Status ='$status' where order_id=$order_id");
    header("location:../order/viewOrder.php?id=$order_id");
} ?>