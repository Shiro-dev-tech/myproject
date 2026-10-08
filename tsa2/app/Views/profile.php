<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

    <h1>User Profile</h1>

    <a href="/">Home</a>
    <a href="/tasks">Task List</a>
    <a href="/profile">Profile</a>
    <a href="/about">About</a>

    <h2>Demo User</h2>

    <p><strong>Username:</strong> <?= $user['username'] ?></p>
    <p><strong>Full Name:</strong> <?= $user['full_name'] ?></p>
    <p><strong>Email:</strong> <?= $user['email'] ?></p>

</body>
</html>