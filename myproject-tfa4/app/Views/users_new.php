<!DOCTYPE html>
<html>
<head>
    <title>New User</title>
</head>
<body>

<h1>Add New User</h1>

<?php if (session()->has('errors')): ?>
    <?php foreach (session('errors') as $error): ?>
        <p><?= esc($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<form action="<?= site_url('users/create') ?>" method="post">

    <?= csrf_field() ?>

    <label>Username:</label><br>
    <input type="text" name="username" value="<?= old('username') ?>">
    <br><br>

    <label>Full Name:</label><br>
    <input type="text" name="full_name" value="<?= old('full_name') ?>">
    <br><br>

    <button type="submit">Add User</button>

</form>

<br>

<a href="<?= site_url('users') ?>">Back to Users</a>

</body>
</html>