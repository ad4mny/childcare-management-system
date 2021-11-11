<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom pb-1">Manage Analytic Report</h1>
        </div>
    </div>
    <div class="row">
        <?php
        if (isset($reports) && $reports != false) {
        ?>
            <div class="col m-1">
                <div class="row bg-white rounded-3 shadow mb-2 p-4">
                    <div class="col">
                        <p class="mb-0">Total Invoice</p>
                        <h3 class="fw-bold mb-0">RM <?php echo $reports['total_invoice']['total']; ?></h3>
                    </div>
                </div>
                <div class="row bg-white rounded-3 shadow mb-2 p-4">
                    <div class="col">
                        <p class="mb-0">Payment Transactions Made</p>
                        <h3 class="fw-bold mb-0"><?php echo $reports['total_invoice']['count']; ?>(s) Transactions</h3>
                    </div>
                </div>
                <div class="row bg-white rounded-3 shadow mb-2 p-4">
                    <div class="col">
                        <p class="mb-0">Announcement Made</p>
                        <h3 class="fw-bold mb-0"><?php echo $reports['total_announcement']['count']; ?>(s) Announcement</h3>
                    </div>
                </div>
            </div>
            <div class="col m-1">
                <div class="row bg-white rounded-3 shadow mb-2 p-4">
                    <div class="col">
                        <p class="mb-0">Registered Parent</p>
                        <h3 class="fw-bold mb-0"><?php echo $reports['total_parent']['count']; ?>(s) Parent</h3>
                    </div>
                </div>
                <div class="row bg-white rounded-3 shadow mb-2 p-4">
                    <div class="col">
                        <p class="mb-0">Registered Children</p>
                        <h3 class="fw-bold mb-0"><?php echo $reports['total_children']['count']; ?>(s) Child</h3>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="col"><p>No analytic data found.</p></div>
        <?php
        } ?>
    </div>
</div>