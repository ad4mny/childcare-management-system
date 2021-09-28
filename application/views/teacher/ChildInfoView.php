<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom pb-1">Child's Information</h1>
        </div>
    </div>
    <div class="row ">
        <?php if (isset($childs) && $childs != false) {
            foreach ($childs as $child) { ?>
                <div class="col-4">
                    <?php
                    if ($child['childPhoto'] !== NULL) {
                        echo '<img class="card-img-top" src="' . base_url() . 'assets/photo/children/' . $child['childPhoto'] . '" alt="No Image">';
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
                            <p class="mb-0 fw-bold"><?php echo $child['childName']; ?></p>
                        </div>
                        <div class="py-2">
                            <small>Identification No. (MyKad)</small>
                            <p class="mb-0 fw-bold"><?php echo $child['childIC']; ?></p>
                        </div>
                        <div class="py-2">
                            <small>Age</small>
                            <p class="mb-0 fw-bold"><?php echo $child['age']; ?> year(s) old</p>
                        </div>
                        <div class="py-2">
                            <small>Allergies</small>
                            <p class="mb-0 fw-bold">
                                <?php
                                if ($child['allergic'] !== NULL)
                                    echo $child['allergic'];
                                else
                                    echo 'None';
                                ?>
                            </p>
                        </div>
                        <div class="py-2">
                            <small>Parent's Full Name</small>
                            <p class="mb-0 fw-bold"><?php echo $child['parentName']; ?></p>
                        </div>
                        <div class="py-2">
                            <small>Parent's Identification No. (MyKad)</small>
                            <p class="mb-0 fw-bold"><?php echo $child['parentIC']; ?></p>
                        </div>
                        <div class="py-2">
                            <small>Address</small>
                            <p class="mb-0 fw-bold"><?php echo $child['address']; ?></p>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>