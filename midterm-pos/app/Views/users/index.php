<!DOCTYPE html>
<html>
<head>
    <title>Staff Management - POS System</title>
</head>
<body>

<h1>Staff Management</h1>

<a href="<?= site_url('users/new') ?>">Add New Staff</a>

<br><br>

<table border="1">
    <tr>
        <th>Avatar</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Action</th>
    </tr>

    <?php foreach ($users as $user): ?>
        <tr>
            <td>
                <?php if (!empty($user['avatar'])): ?>
                    <img
                        src="<?= base_url('uploads/users/' . $user['avatar']) ?>"
                        width="80"
                        height="80"
                        alt="Avatar"
                    >
                <?php else: ?>
                    No Avatar
                <?php endif; ?>
            </td>

            <td><?= esc($user['username']) ?></td>
            <td><?= esc($user['full_name']) ?></td>

            <td>
                <a href="<?= site_url('users/edit/' . $user['id']) ?>">
                    Edit
                </a>

                <form
                    action="<?= site_url('users/delete/' . $user['id']) ?>"
                    method="post"
                    style="display:inline;"
                >
                    <?= csrf_field() ?>
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>