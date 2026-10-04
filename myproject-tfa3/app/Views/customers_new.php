<!DOCTYPE html>
<html>
<head>
    <title>New Customer</title>
</head>
<body>

<h1>Add New Customer</h1>

<?php if (session()->has('errors')): ?>
    <?php foreach (session('errors') as $error): ?>
        <p><?= esc($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<form action="<?= site_url('customers/create') ?>" method="post">

    <?= csrf_field() ?>

    <label>Full Name:</label><br>
    <input type="text" name="full_name" value="<?= old('full_name') ?>">
    <br><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?= old('email') ?>">
    <br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" value="<?= old('phone') ?>">
    <br><br>

    <button type="submit">Add Customer</button>

</form>

<br>

<a href="/customers">Back to Customers</a>

</body>
</html>