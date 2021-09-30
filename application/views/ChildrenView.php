<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom pb-1">Your Registered Children</h1>
        </div>
    </div>
    <div class="row row-cols-4 g-4">
        <?php if (isset($childrens) && $childrens != false) {
            foreach ($childrens as $child) { ?>
                <div class="col d-flex">
                    <div class="card h-100 rounded-3 border-0 shadow position-relative">
                        <?php
                        if ($child['photo'] !== NULL) {
                            echo '<img class="card-img-top" src="' . base_url() . 'assets/photo/children/' . $child['photo'] . '" alt="No Image">';
                        } else {
                            echo '<img class="card-img-top" src="' . base_url() . 'assets/photo/placeholder.png" alt="No Image">';
                        }
                        ?>
                        <div class="card-body">
                            <h5 class="text-capitalize"><?php echo $child['fullname']; ?></h5>
                            <div class="card-text">
                                <small>MyKad</small>
                                <p class="mb-0 fw-bold"><?php echo $child['icnumber']; ?></p>
                            </div>
                            <div class="card-text pt-2">
                                <small>Age</small>
                                <p class="mb-0 fw-bold"><?php echo $child['age']; ?> year(s) old</p>
                            </div>
                            <div class="card-text pt-2">
                                <small>Allergic</small>
                                <p class="mb-0 fw-bold">
                                    <?php
                                    if ($child['allergic'] !== NULL)
                                        echo $child['allergic'];
                                    else
                                        echo 'None';
                                    ?>
                                </p>
                            </div>
                            <div class="position-absolute bottom-0 end-0 me-2 mb-2">
                                <a href="<?php echo base_url() . 'children/view/' . $child['childrenid']; ?>" class="btn btn-primary btn-sm">
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
                    <h5 class="text-capitalize">Register new child</h5>
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#registerChild"><i class="fas fa-plus fa-fw fa-4x"></i></button>
                </div>
            </div>
        </div>
    </div>
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