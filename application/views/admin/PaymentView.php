<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom pb-1">Manage Payment List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="bg-white shadow rounded-3 p-4">
                <p>Add payment</p>
                <form class="row g-2" method="post" action="<?php echo base_url(); ?>manage/payment/submit">
                    <div class="col-12">
                        <select class="form-select" name="childid" required>
                            <option disabled selected>Choose child's name</option>
                            <?php if (isset($childrens) && $childrens != false) {
                                foreach ($childrens as $children) { ?>
                                    <option value="<?php echo $children['childrenid'] . '/'. $children['parentid']; ?>"><?php echo $children['fullname']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">RM</span>
                            <input type="text" class="form-control" name="amount" placeholder="Enter payment amount" required>
                        </div>
                    </div>      
                    <div class="col-12">
                    <select class="form-select" name="month" required>
                        <option value="Jan">January</option>
                        <option value="Feb">February</option>
                        <option value="Mar">March</option>
                        <option value="Apr">April</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">July</option>
                        <option value="Aug">August</option>
                        <option value="Sep">September</option>
                        <option value="Oct">October</option>
                        <option value="Nov">November</option>
                        <option value="Dec">December</option>
                    </select>
                    </div>
                    
                    <div class="col-12">
                        <select class="form-select" name="status" required>
                            <option value="paid">Paid</option>
                            <option value="unpaid">Unpaid</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
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
                        <div class="col-1 m-auto">
                            <a href="<?php echo base_url() . 'manage/payment/remove/' . $payment['paymentid']; ?>" class="text-danger " onclick="return confirm('Are you sure want to delete this attendence?');">
                                <i class="fas fa-times fa-fw "></i>
                            </a>
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