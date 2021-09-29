<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom pb-1">All Attendence List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="bg-white shadow rounded-3 p-4">
                <p>Add an attendence</p>
                <form class="row g-2" method="post" action="<?php echo base_url(); ?>teacher/attendence/submit">
                    <div class="col-12">
                        <select class="form-select" name="childid" required>
                            <option disabled selected>Choose child's name</option>
                            <?php if (isset($childs) && $childs != false) {
                                foreach ($childs as $child) { ?>
                                    <option value="<?php echo $child['childrenid']; ?>"><?php echo $child['fullname']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <select class="form-select" name="status" required>
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
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
            if (isset($attendences) && $attendences != false) {
                foreach ($attendences as $attendence) {
            ?>
                    <div class="row ">
                        <div class="col">
                            <h5 class="text-capitalize mb-0"><?php echo $attendence['date']; ?></h5>
                        </div>
                    </div>
                    <?php
                    $child = explode(",", $attendence['fullname']);
                    $status = explode(",", $attendence['status']);
                    for ($i = 0; $i < sizeof($child); $i++) {
                    ?>
                        <div class="row rounded-3 shadow bg-white p-2 my-2">
                            <div class="col-7">
                                <p class="text-capitalize mb-0"><?php echo $child[$i]; ?></p>
                            </div>
                            <div class="col">
                                <p class="text-capitalize mb-0"><?php echo $status[$i]; ?></p>
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