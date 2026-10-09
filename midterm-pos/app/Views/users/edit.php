<!DOCTYPE html>
<html>
<head>
    <title>Edit Staff - POS System</title>
</head>
<body>

<h1>Edit Staff</h1>

<?php if (session()->has('errors')): ?>
    <?php foreach (session('errors') as $error): ?>
        <p><?= esc($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (!empty($user['avatar'])): ?>
    <p>Current Avatar:</p>

    <img
        src="<?= base_url('uploads/users/' . $user['avatar']) ?>"
        width="120"
        height="120"
        alt="Avatar"
    >

    <br><br>
<?php endif; ?>

<form
    action="<?= site_url('users/update/' . $user['id']) ?>"
    method="post"
    enctype="multipart/form-data"
>

    <?= csrf_field() ?>

    <label>Username:</label><br>
    <input
        type="text"
        name="username"
        value="<?= old('username', $user['username']) ?>"
    >

    <br><br>

    <label>Full Name:</label><br>
    <input
        type="text"
        name="full_name"
        value="<?= old('full_name', $user['full_name']) ?>"
    >

    <br><br>

    <label>New Password:</label><br>
    <input type="password" name="password">
    <small>Leave blank to keep the current password.</small>

    <br><br>

    <label>Replace Avatar:</label><br>
    <input
        type="file"
        name="avatar"
        accept=".jpg,.jpeg,.png"
    >

    <br><br>

    <button type="submit">Update Staff</button>

</form>

<br>

<a href="<?= site_url('users') ?>">Back to Staff</a>

</body>
</html>