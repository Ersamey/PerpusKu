<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="login">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 28rem;">
                    <div class="card-body">
                        <h5 class="card-title">Welcome to Perpusku!</h5>
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <form action="<?= url_to('login') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="">Email or username</label>
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                            </div>

                            <a href="index.html" class="btn btn-primary btn-user btn-block">
                                Login
                            </a>
                            <hr>
                        </form>
                        <hr>

                        <div class="text-center">
                            <p>Do you want to create an account?<a class="small" href="/register">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>