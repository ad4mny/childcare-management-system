<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom pb-1">Your Profile</h1>
        </div>
    </div>
    <div class="row ">
        <?php if (isset($profiles) && $profiles != false) { ?>
            <div class="col-4">
                <?php
                if ($profiles['photo'] !== NULL) {
                    echo '<img class="card-img-top" src="' . base_url() . 'assets/photo/parent/' . $profiles['photo'] . '" alt="No Image">';
                } else {
                    echo '<div class="p-4  bg-white shadow text-center">
                    <i class="fas fa-user fa-fw fa-5x text-muted"></i>
                    </div>';
                }
                ?>
            </div>

            <div class="col">
                <div class="rounded-3 shadow position-relative text-uppercase p-4">
                    <div class="py-2">
                        <small>Username</small>
                        <p class="mb-0 fw-bold"><?php echo $profiles['username']; ?></p>
                    </div>
                    <div class="py-2">
                        <small>Full Name</small>
                        <p class="mb-0 fw-bold"><?php echo $profiles['fullname']; ?></p>
                    </div>
                    <div class="py-2">
                        <small>Identification No. (MyKad)</small>
                        <p class="mb-0 fw-bold"><?php echo $profiles['icnumber']; ?></p>
                    </div>
                    <div class="py-2">
                        <small>Address</small>
                        <p class="mb-0 fw-bold"><?php echo $profiles['address']; ?></p>
                    </div>
                    <div class="py-2">
                        <small>Contact Number (Mobile)</small>
                        <p class="mb-0 fw-bold"><?php echo $profiles['phone']; ?></p>
                    </div>
                    <div class="py-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateProfile">
                            <i class="fas fa-cog fa-fw "></i> Update Profile
                        </button>
                    </div>
                </div>
            </div>

        <?php } else {
            redirect(base_url() . 'logout');
        } ?>

    </div>
</div>

<div class="modal fade" id="updateProfile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Update Profile</h3>
            </div>
            <div class="modal-body">
                <form class="row g-2" method="post" action="<?php echo base_url(); ?>profile/update/submit" enctype="multipart/form-data">
                    <div class="col-6 pb-2">
                        <small>Full Name</small>
                        <input type="text" class="form-control" name="fullname" value="<?php echo $profiles['fullname']; ?>" placeholder="Enter your full name as in MyKad">
                    </div>
                    <div class="col-6 pb-2">
                        <small>Indentification No. (MyKad)</small>
                        <input type="text" class="form-control" name="icnumber" value="<?php echo $profiles['icnumber']; ?>" placeholder="Enter your identificaiton number">
                    </div>
                    <div class="col-6 pb-2">
                        <small>Phone No. (Mobile)</small>
                        <input type="text" class="form-control" name="phone" value="<?php echo $profiles['phone']; ?>" placeholder="Enter your mobile number">
                    </div>
                    <div class="col-6 pb-2">
                        <small>Address</small>
                        <textarea class="form-control" name="address" placeholder="Enter your full address" rows="3" max="150">
                            <?php echo $profiles['address']; ?>
                        </textarea>
                    </div>
                    <div class="col-6 pb-2">
                        <small>Username</small>
                        <input type="text" class="form-control" name="username" value="<?php echo $profiles['username']; ?>" placeholder="Enter your username">
                    </div>
                    <div class="col-12 pb-2">
                        <small>Add Profile Photo</small>
                        <input type="file" class="form-control" name="photo" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" type="button" name="submit" onclick="return confirm('Confirm profiel update?');">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>