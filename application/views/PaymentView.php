<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom pb-1">Your Children Payment List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col" >
            <?php
            if (isset($payments) && $payments != false) {
                foreach ($payments as $payment) {
            ?>
                    <div class="row p-1 bg-white rounded-3 shadow my-1">
                        <div class="col">
                            <p class="text-capitalize mb-0"><?php echo $payment['fullname']; ?></p>
                        </div>
                        <div class="col-2">
                            <p class="text-capitalize mb-0"><?php echo $payment['month']; ?></p>
                        </div>
                        <div class="col-2">
                            <p class="text-capitalize mb-0 text-success">RM <?php echo $payment['fee']; ?></p>
                        </div>
                        <div class="col">
                            <p class="mb-0 ">Payment made at <?php echo $payment['date'] . ', ' . $payment['time']; ?></p>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <p>No payments has been made.</p>
            <?php
            } ?>
        </div>
    </div>
</div>