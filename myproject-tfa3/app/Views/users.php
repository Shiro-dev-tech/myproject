<!DOCTYPE html>
<html>
<head>
    <title>User Accounts - POS System</title>
</head>
<body>

    <h1>User Accounts</h1>

    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/customers">Customers</a>
    <a href="/users">Users</a>

    <br><br>

    <a href="<?= site_url('users/new') ?>">Add New User</a>

    <br><br>

    <table border="1">
        <tr>
            <th>Avatar</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?php if (!empty($user['avatar'])): ?>

                        <img
                            src="<?= base_url('uploads/' . $user['avatar']) ?>"
                            width="80"
                            height="80"
                            alt="User Avatar"
                        >

                    <?php else: ?>

                        <img
                            src="<?= base_url('uploads/placeholder.png') ?>"
                            width="80"
                            height="80"
                            alt="Placeholder Avatar"
                        >

                    <?php endif; ?>
                </td>

                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['full_name']) ?></td>
                <td><?= esc($user['created_at']) ?></td>

                <td>
                    <a href="<?= site_url('users/edit/' . $user['id']) ?>">
                        Edit
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>