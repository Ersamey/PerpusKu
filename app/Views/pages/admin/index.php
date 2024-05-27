<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>User List</h1>
            <form action="" method="post" class="col mt-3">
                <input type="text" placeholder="username">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <div class="users">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($user as $u) :
                        $roleName = '';
                        foreach ($role as $r) {
                            if ($u['id'] == $r['user_id']) {
                                $roleName = $r['name'];
                                break;
                            }
                        }
                    ?>

                        <tr>
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
                                        <button type="submit" class="btn btn-primary">Save</button>
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
                </table>
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