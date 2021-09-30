<?php if ($_SESSION['role'] == 0) { ?>
    <nav class="navbar navbar-light bg-white shadow sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bonda Sadiah</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="fas fa-bars fa-fw"></i> Menu
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Parent</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(1) == 'dashboard') echo 'active border-bottom'; ?>" href="<?php echo base_url(); ?>dashboard">Register Children</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(1) == 'announcement') echo 'active border-bottom'; ?>" href="<?php echo base_url(); ?>announcement">Announcement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(1) == 'attendence') echo 'active border-bottom'; ?>" href="<?php echo base_url(); ?>attendence">Attendence</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(1) == 'payment') echo 'active border-bottom'; ?>" href="<?php echo base_url(); ?>payment">Payment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(1) == 'profile') echo 'active border-bottom'; ?>" href="<?php echo base_url(); ?>profile">Profile</a>
                        </li>
                    </ul>
                    <form class="d-flex pt-5 ">
                        <a class="btn btn-danger" href="<?php echo base_url(); ?>logout">Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </nav>
<?php }
if ($_SESSION['role'] == 1) { ?>
    <nav class="navbar navbar-light bg-white shadow sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bonda Sadiah</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="fas fa-bars fa-fw"></i> Menu
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Administrator</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(2) == 'parent') echo 'active border-bottom'; ?>" href="<?php echo base_url(); ?>manage/parent">Manage Parent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(2) == 'announcement') echo 'active border-bottom'; ?>" href="<?php echo base_url(); ?>manage/announcement">Manage Announcement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(2) == 'attendence') echo 'active border-bottom'; ?>" href="<?php echo base_url(); ?>manage/attendence">Manage Attendence</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(2) == 'payment') echo 'active border-bottom'; ?>" href="<?php echo base_url(); ?>manage/payment">Manage Payment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(2) == 'profile') echo 'active border-bottom'; ?>" href="<?php echo base_url(); ?>manage/profile">Manage Teacher</a>
                        </li>
                    </ul>
                    <form class="d-flex pt-5 ">
                        <a class="btn btn-danger" href="<?php echo base_url(); ?>logout">Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </nav>
<?php }  ?>

<div id="alert" class="w-75 position-absolute start-50 translate-middle mt-5" style="z-index: 1; top: 10%;">
    <?php
    if ($this->session->tempdata('notice') != NULL) {
        echo '<div class="alert alert-success border-0 shadow alert-dismissible fade show" role="alert">';
        echo '<i class="fas fa-info-circle fa-fw"></i> ' . $this->session->tempdata('notice');
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }
    if ($this->session->tempdata('error') != NULL) {
        echo '<div class="alert alert-danger border-0 shadow alert-dismissible fade show" role="alert">';
        echo '<i class="fas fa-exclamation-circle fa-fw"></i> ' . $this->session->tempdata('error');
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }
    ?>
</div>