<!DOCTYPE html>
<html>
<head>
    <title>Add Staff - POS System</title>
</head>
<body>

<h1>Add New Staff</h1>

<?php if (session()->has('errors')): ?>
    <?php foreach (session('errors') as $error): ?>
        <p><?= esc($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<form
    action="<?= site_url('users/create') ?>"
    method="post"
    enctype="multipart/form-data"
>

    <?= csrf_field() ?>

    <label>Username:</label><br>
    <input
        type="text"
        name="username"
        value="<?= old('username') ?>"
    >

    <br><br>

    <label>Full Name:</label><br>
    <input
        type="text"
        name="full_name"
        value="<?= old('full_name') ?>"
    >

    <br><br>

    <label>Password:</label><br>
    <input type="password" name="password">

    <br><br>

    <label>Avatar:</label><br>
    <input
        type="file"
        name="avatar"
        accept=".jpg,.jpeg,.png"
    >

    <br><br>

    <button type="submit">Add Staff</button>

</form>

<br>

<a href="<?= site_url('users') ?>">Back to Staff</a>

</body>
</html>