<!DOCTYPE html>
<html>
<head>
    <title>Login - POS System</title>
</head>
<body>

    <h1>POS Login</h1>

    <?php if (session()->has('error')): ?>
        <p><?= esc(session('error')) ?></p>
    <?php endif; ?>

    <form action="<?= site_url('login') ?>" method="post">

        <?= csrf_field() ?>

        <label>Username:</label><br>
        <input
            type="text"
            name="username"
            value="<?= old('username') ?>"
        >

        <br><br>

        <label>Password:</label><br>
        <input type="password" name="password">

        <br><br>

        <button type="submit">Login</button>

    </form>

</body>
</html>