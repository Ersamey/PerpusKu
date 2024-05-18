<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?><div class="container">
    <div class="row">
        <div class="col">
            <h1>Welcome to Perpusku!</h1>
            <p>Do you want to create an account?<a href="#">Sign Up</a></p>
            <h3>Sign In</h3>
            <!-- FORM LOGIN -->
            <form class="row g-3" action="/login/validasi" method="post">
                <?= csrf_field(); ?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="name@example.com">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    <label for="password">Password</label>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>