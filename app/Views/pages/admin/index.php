<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="bg-belakang-list-user">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="gradient-text-admin mt-3 mb-3 pt-5">USER LIST</h1>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <div class="col-xs-3">
                            <input type="text" class="form-control col-xs-3" placeholder="Masukkan Username" name="keyword">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div id="bookForm">
                    <div class="users mt-3 d-flex flex-wrap">
                        <table class="table table-bordered table-striped" style='text-align:center; vertical-align:middle'>
                            <tr style="background-color:rgba(92, 87, 239, 0.396)">
                                <th>Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            <div class="table-striped">
                                <?php foreach ($user as $u) :
                                    $roleName = '';
                                    foreach ($role as $r) {
                                        if ($u['id'] == $r['user_id']) {
                                            $roleName = $r['name'];
                                            break;
                                        }
                                    }
                                ?>
                                    <td><?= $u['id']; ?></td>
                                    <td><?= $u['username']; ?></td>
                                    <td><?= $u['email']; ?></td>
                                    <td><?= $roleName; ?></td>
                                    <td>
                                        <button class="btn btn-primary" onclick="toggleRoleForm(<?= $u['id']; ?>)">Ubah Role</button>
                                        <div class="role" id="roleForm-<?= $u['id']; ?>" style="display: none;">
                                            <form action="/admin/save" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="user_id" value="<?= $u['id']; ?>">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="role" id="admin<?= $u['id']; ?>" value="1">
                                                    <label class="form-check-label" for="admin<?= $u['id']; ?>">
                                                        Admin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="role" id="perpustakaan<?= $u['id']; ?>" value="3">
                                                    <label class="form-check-label" for="perpustakaan<?= $u['id']; ?>">
                                                        Perpustakaan
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="role" id="user<?= $u['id']; ?>" value="2">
                                                    <label class="form-check-label" for="user<?= $u['id']; ?>">
                                                        User
                                                    </label>
                                                </div>
                                                <div class="mt-2 mb-2">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                        <form action="/admin/<?= $u['id']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Delete</button>
                                        </form>
                                    </td>
                                    </tr>

                                <?php endforeach; ?>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleRoleForm(userId) {
        var form = document.getElementById('roleForm-' + userId);
        if (form.style.display === 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
</script>

<?= $this->endSection(); ?>