<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom pb-1">Child's Profile</h1>
        </div>
    </div>
    <div class="row ">
        <?php if (isset($childs) && $childs != false) { ?>
            <div class="col-4">
                <?php
                if ($childs['childPhoto'] !== NULL) {
                    echo '<img class="card-img-top" src="' . base_url() . 'assets/photo/children/' . $childs['childPhoto'] . '" alt="No Image">';
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
                        <small>Full Name</small>
                        <p class="mb-0 fw-bold"><?php echo $childs['childName']; ?></p>
                    </div>
                    <div class="py-2">
                        <small>Identification No. (MyKad)</small>
                        <p class="mb-0 fw-bold"><?php echo $childs['childIC']; ?></p>
                    </div>
                    <div class="py-2">
                        <small>Age</small>
                        <p class="mb-0 fw-bold"><?php echo $childs['age']; ?></p>
                    </div>
                    <div class="py-2">
                        <small>Allergies</small>
                        <p class="mb-0 fw-bold">
                            <?php
                            if ($childs['allergic'] !== NULL)
                                echo $childs['allergic'];
                            else
                                echo 'None';
                            ?>
                        </p>
                    </div>
                    <div class="py-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateChild">
                            <i class="fas fa-cog fa-fw "></i> Update Child
                        </button>
                    </div>
                </div>
            </div>
        <?php } else {
        } ?>

    </div>
</div>

<div class="modal fade" id="updateChild" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Update Child's Profile</h3>
            </div>
            <div class="modal-body">
                <form class="row g-2" method="post" action="<?php echo base_url(); ?>children/update/submit" enctype="multipart/form-data">
                    <div class="col-12 pb-2">
                        <small>Child's Full Name</small>
                        <input type="text" class="form-control" name="fullname" value="<?php echo $childs['childName']; ?>" placeholder="Enter child's full name as in MyKad" required>
                    </div>
                    <div class="col-12 pb-2">
                        <small>Child's Indentification No. (MyKad)</small>
                        <input type="text" class="form-control" name="icnumber" value="<?php echo $childs['childIC']; ?>" placeholder="Enter child's identificaiton number" required>
                    </div>
                    <div class="col-12 pb-2">
                        <small>Child's Age</small>
                        <input type="number" class="form-control" name="age" value="<?php echo $childs['age']; ?>" placeholder="Enter child's age" required>
                    </div>
                    <div class="col-12 pb-2">
                        <small>Child's Allergies</small>
                        <textarea class="form-control" name="allergic" placeholder="Enter child's allergies with description" rows="3" max="500" required><?php echo $childs['allergic']; ?></textarea>
                    </div>
                    <div class="col-12 pb-2">
                        <small>Child's Photo</small>
                        <input type="file" class="form-control" name="photo" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" type="button" name="submit" onclick="return confirm('Are you sure to update this child?');">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>