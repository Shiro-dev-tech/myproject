<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h1>Edit User</h1>

<?php if (session()->has('errors')): ?>
    <?php foreach (session('errors') as $error): ?>
        <p><?= esc($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<form action="<?= site_url('users/update/' . $user['id']) ?>"
      method="post"
      enctype="multipart/form-data">

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

    <label>Profile Picture:</label><br>
    <input type="file" name="avatar" accept=".jpg,.jpeg,.png">

    <br><br>

    <button type="submit">Update User</button>

</form>

<br>

<a href="<?= site_url('users') ?>">Back to Users</a>

</body>
</html>