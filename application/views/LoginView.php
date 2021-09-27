<div class="masthead">
    <nav class="navbar navbar-light bg-light justify-content-between px-3">
        <a class="navbar-brand">Bonda Sediah</a>
    </nav>
    <div class="container position-absolute top-50 start-50 translate-middle w-100">
        <div class="row d-flex align-items-center">
            <div class="col">
                <h1 class="font-weight-light text-white">Welcome to Bonda Sediah</h1>
                <p class="lead text-white">Your Childcare Management System. Register your child, today.</p>
                <a href="<?php echo base_url() . 'register'; ?>" class="btn btn-outline-light">Register Now</a>
            </div>
            <div class="col-4 bg-white p-4 rounded-3">
                <h3>Login</h3>
                <form method="post" action="<?php echo base_url() . 'login/submit'; ?>">
                    <div class="form-group pb-2">
                        <small>Username</small>
                        <input type="text" class="form-control" name="username" placeholder="Enter your username">
                    </div>
                    <div class="form-group pb-2">
                        <small>Password</small>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password">
                    </div>
                    <div class="form-group pb-2">
                        <button type="submit" class="btn btn-primary" type="button" name="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>