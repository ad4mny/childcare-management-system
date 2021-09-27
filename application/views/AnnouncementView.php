<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom pb-1">Announcements</h1>
        </div>
    </div>
    <?php if (isset($announcements) && $announcements != false) {
        foreach ($announcements as $announcement) { ?>
            <div class="row py-2">
                <div class="col">
                    <div class="card h-100 rounded-3 border-0 shadow">
                        <div class="card-header">
                        <h5 class="text-capitalize"><?php echo $announcement['title']; ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <p class="mb-0"><?php echo $announcement['description']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php }
    } else { ?>
     <div class="row py-2">
                <div class="col">
                    <div class="card h-100 rounded-3 border-0 shadow">
                        <div class="card-body">
                            <div class="card-text">
                                <p class="mb-0">No new announcements.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>
</div>

<div class="modal fade" id="registerChild" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Child Registration</h3>
            </div>
            <div class="modal-body">
                <form class="row g-2" method="post" action="<?php echo base_url(); ?>dashboard/register/submit" enctype="multipart/form-data">
                    <div class="col-12 pb-2">
                        <small>Child's Full Name</small>
                        <input type="text" class="form-control" name="fullname" placeholder="Enter child's full name as in MyKad" required>
                    </div>
                    <div class="col-12 pb-2">
                        <small>Child's Indentification No. (MyKad)</small>
                        <input type="text" class="form-control" name="icnumber" placeholder="Enter child's identificaiton number" required>
                    </div>
                    <div class="col-12 pb-2">
                        <small>Child's Age</small>
                        <input type="number" class="form-control" name="age" placeholder="Enter child's age" required>
                    </div>
                    <div class="col-12 pb-2">
                        <small>Child's Allergies</small>
                        <textarea class="form-control" name="allergic" placeholder="Enter child's allergies with description" rows="3" max="500" required></textarea>
                    </div>
                    <div class="col-12 pb-2">
                        <small>Child's Photo</small>
                        <input type="file" class="form-control" name="photo" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" type="button" name="submit" onclick="return confirm('Are you sure to add this child?');">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>