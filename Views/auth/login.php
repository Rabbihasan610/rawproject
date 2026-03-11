<div class="container">
    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">

                    <h4 class="text-center mb-4">Login</h4>


                    <?php 
                    if (isset($error)) {
                        echo '<div class="alert alert-danger">' . $error . '</div>';
                    }
                    ?>

                    <form action="/login-store" method="POST">

                        <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                        
                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>

                        <!-- Remember -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember">
                            <label class="form-check-label">Remember me</label>
                        </div>

                        <!-- Button -->
                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>