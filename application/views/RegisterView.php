<nav class="navbar navbar-light bg-light justify-content-between px-3">
    <a class="navbar-brand">Bonda Sediah</a>
    <a href="<?php echo base_url() . 'login'; ?>" class="btn btn-outline-primary">Login</a>
</nav>

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