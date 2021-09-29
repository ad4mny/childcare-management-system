<div class="masthead">

    <nav class="navbar navbar-light bg-light justify-content-between px-3">
        <a class="navbar-brand">Bonda Sediah</a>
        <a href="<?php echo base_url() . 'login'; ?>" class="btn btn-outline-primary">Login</a>
    </nav>

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

    <div class="container position-absolute top-50 start-50 translate-middle w-100 ">
        <div class="row d-flex align-items-center">
            <div class=" offset-2 col-8 bg-white p-4 rounded-3">
                <h3>Registration</h3>
                <form class="row g-2" method="post" action="<?php echo base_url() . 'register/submit'; ?>">
                    <div class="col-6 pb-2">
                        <small>Full Name</small>
                        <input type="text" class="form-control" name="fullname" placeholder="Enter your full name as in MyKad">
                    </div>
                    <div class="col-6 pb-2">
                        <small>Indentification No. (MyKad)</small>
                        <input type="text" class="form-control" name="icnumber" placeholder="Enter your identificaiton number">
                    </div>
                    <div class="col-6 pb-2">
                        <small>Phone No. (Mobile)</small>
                        <input type="text" class="form-control" name="phone" placeholder="Enter your mobile number">
                    </div>
                    <div class="col-6 pb-2">
                        <small>Address</small>
                        <textarea class="form-control" name="address" placeholder="Enter your full address" rows="3" max="150"></textarea>
                    </div>
                    <div class="col-6 pb-2">
                        <small>Username</small>
                        <input type="text" class="form-control" name="username" placeholder="Enter your username">
                    </div>
                    <div class="col-6 pb-2">
                        <small>Password</small>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password">
                    </div>
                    <div class="col-6 offset-6 pb-2">
                        <small>Confirm Password</small>
                        <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm your password">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" type="button" name="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>