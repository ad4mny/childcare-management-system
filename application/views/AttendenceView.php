<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom pb-1">Your Children Attendence List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col overflow-auto" style="height:65vh;">
            <?php
            if (isset($attendences) && $attendences != false) {
                foreach ($attendences as $attendence) {
            ?>
                    <div class="row pt-3">
                        <div class="col">
                            <p class="text-capitalize mb-0 fw-bold"><?php echo $attendence['date']; ?></p>
                        </div>
                    </div>
                    <?php
                    $child = explode(",", $attendence['fullname']);
                    $status = explode(",", $attendence['status']);
                    $time = explode(",", $attendence['time']);
                    for ($i = 0; $i < sizeof($child); $i++) {
                    ?>
                        <div class="row rounded-3 shadow bg-white p-1 my-1">
                            <div class="col-7">
                                <p class="text-capitalize mb-0"><?php echo $child[$i]; ?></p>
                            </div>
                            <div class="col">
                                <p class="text-capitalize mb-0"><?php echo $status[$i]; ?></p>
                            </div>
                            <div class="col">
                                <p class="text-capitalize mb-0"><?php echo $time[$i]; ?></p>
                            </div>
                        </div>
                <?php
                    }
                }
            } else {
                ?>
                <p>No attendence list found.</p>
            <?php
            } ?>
        </div>
    </div>
</div>