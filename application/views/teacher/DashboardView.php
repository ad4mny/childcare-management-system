<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom pb-1">All Registered Children</h1>
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
                            echo '<img class="card-img-top" src="https://dummyimage.com/640x360/f0f0f0/aaa" alt="No Image">';
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
                                <a href="<?php echo base_url() . 'teacher/dashboard/remove/' . $child['childrenid']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delte this child info?');">
                                    <i class="fas fa-times fa-fw "></i>
                                </a>
                                <a href="<?php echo base_url() . 'teacher/dashboard/view/' . $child['childrenid']; ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye fa-fw "></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>