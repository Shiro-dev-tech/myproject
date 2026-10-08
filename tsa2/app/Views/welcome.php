<!DOCTYPE html>
<html>
<head>
    <title>Tasks for Today</title>
</head>
<body>

    <h1>Tasks for Today</h1>

    <a href="/">Home</a>
    <a href="/tasks">Task List</a>
    <a href="/profile">Profile</a>
    <a href="/about">About</a>

    <h2>Today's Tasks</h2>

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