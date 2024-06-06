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
                            <?php if ($config->validFields === ['email']) : ?>
                                <div class="form-group">
                                    <label for="login"><?= lang('Auth.email') ?></label>
                                    <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail" aria-describedby="emailHelp" name="login" placeholder="<?= lang('Auth.email') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="form-group">
                                    <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                                    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="password"><?= lang('Auth.password') ?></label>
                                <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" id="exampleInputPassword" placeholder="Password">
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>

                            <?php if ($config->allowRemembering) : ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                        <?= lang('Auth.rememberMe') ?>
                                    </label>
                                </div>
                            <?php endif; ?>

                            <button type="submit" class="btn btn-primary btn-user btn-block"><?= lang('Auth.loginAction') ?></button>
                            <hr>
                        </form>
                        <hr>

                        <?php if ($config->allowRegistration) : ?>
                            <div class="text-center">
                                <p>Do you want to create an account?<a class="small" href="/register"><?= lang('Auth.needAnAccount') ?></a></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>