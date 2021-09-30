<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom pb-1">Manage Attendence List</h1>
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
                            <?php if (isset($childrens) && $childrens != false) {
                                foreach ($childrens as $children) { ?>
                                    <option value="<?php echo $children['childrenid']; ?>"><?php echo $children['fullname']; ?></option>
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
                    $id = explode(",", $attendence['attendenceid']);
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
                            <div class="col-1">
                                <a href="<?php echo base_url() . 'manage/attendence/remove/' . $id[$i]; ?>" class="text-danger " onclick="return confirm('Are you sure want to delete this attendence?');">
                                    <i class="fas fa-times fa-fw "></i>
                                </a>
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