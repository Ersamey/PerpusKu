<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>User List</h1>
            <!-- <button class="btn btn-primary">Add New</button> -->
            <form action="" method="post" class="col mt-3">
                <input type=" text" placeholder="username">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

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
                                <button class="btn btn-primary">Ubah Role</button>
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
    <?= $this->endSection(); ?>