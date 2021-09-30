<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom pb-1">Manage Registered Teacher</h1>
        </div>
    </div>
    <div class="row row-cols-4 g-4">
        <?php if (isset($teachers) && $teachers != false) {
            foreach ($teachers as $teacher) { ?>
                <div class="col d-flex">
                    <div class="card h-100 rounded-3 border-0 shadow position-relative">
                        <?php
                        if ($teacher['photo'] !== NULL) {
                            echo '<img class="card-img-top" src="' . base_url() . 'assets/photo/teacher/' . $teacher['photo'] . '" alt="No Image">';
                        } else {
                            echo '<img class="card-img-top" src="' . base_url() . 'assets/photo/placeholder.png" alt="No Image">';
                        }
                        ?>
                        <div class="card-body">
                            <h5 class="text-capitalize"><?php echo $teacher['fullname']; ?></h5>
                            <div class="card-text">
                                <small>MyKad</small>
                                <p class=" fw-bold"><?php echo $teacher['icnumber']; ?></p>
                            </div>
                            <div class="card-text">
                                <small>Contact (Mobile)</small>
                                <p class=" fw-bold"><?php echo $teacher['phone']; ?></p>
                            </div>
                            <div class="card-text">
                                <small>Address</small>
                                <p class="fw-bold text-capitalize"><?php echo $teacher['address']; ?></p>
                            </div>
                            <div class="position-absolute top-0 end-0 me-2 mt-2">
                                <a href="<?php echo base_url() . 'manage/teacher/remove/' . $teacher['userid']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delte this child info?');">
                                    <i class="fas fa-times fa-fw "></i>
                                </a>
                                <a href="<?php echo base_url() . 'manage/teacher/view/' . $teacher['userid']; ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye fa-fw "></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
        <div class="col d-flex">
            <div class="card h-100 rounded-3 shadow">
                <img class="card-img-top" src="<?php echo base_url(); ?>assets/photo/placeholder.png" alt="No Image">
                <div class="card-body  text-center">
                    <h5 class="text-capitalize">Register new teacher</h5>
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#registerTeacher"><i class="fas fa-plus fa-fw fa-4x"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registerTeacher" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Update Teacher</h3>
            </div>
            <div class="modal-body">
                <form class="row g-2" method="post" action="<?php echo base_url(); ?>manage/teacher/submit" enctype="multipart/form-data">
                    <div class="col-12 pb-2">
                        <small>Teacher's Full Name</small>
                        <input type="text" class="form-control" name="fullname" placeholder="Enter tecaher's full name as in MyKad" required>
                    </div>
                    <div class="col-12 pb-2">
                        <small>Teacher's Indentification No. (MyKad)</small>
                        <input type="text" class="form-control" name="icnumber" placeholder="Enter tecaher's identification number" required>
                    </div>
                    <div class="col-12 pb-2">
                        <small>Teacher's Contact No. (Mobile)</small>
                        <input type="text" class="form-control" name="phone" placeholder="Enter tecaher's phone" required>
                    </div>
                    <div class="col-12 pb-2">
                        <small>Teacher's Address</small>
                        <textarea class="form-control" name="address" placeholder="Enter tecaher's address" rows="3" max="150" required></textarea>
                    </div>
                    <div class="col-12 pb-2">
                        <small>Teacher's Photo</small>
                        <input type="file" class="form-control" name="photo" required>
                    </div>
                    <div class="col-6 pb-2">
                        <small>Teacher's Username</small>
                        <input type="text" class="form-control" name="username" placeholder="Enter teacher username">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" type="button" name="submit" onclick="return confirm('Are you sure to add this new teacher?');">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>