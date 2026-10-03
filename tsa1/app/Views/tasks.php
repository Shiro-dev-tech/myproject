<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>
<body>

    <h1>All Tasks</h1>

    <a href="/">Home</a>
    <a href="/tasks">Task List</a>
    <a href="/profile">Profile</a>
    <a href="/about">About</a>

    <br><br>

    <table border="1">
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['title'] ?></td>
                <td><?= $task['status'] ?></td>
                <td><?= $task['task_date'] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>