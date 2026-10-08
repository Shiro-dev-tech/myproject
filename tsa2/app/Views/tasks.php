<!DOCTYPE html>
<html>
<head>
    <title>Task List - Tasks for Today</title>
</head>
<body>

    <h1>Task List</h1>

    <a href="/">Home</a>
    <a href="/tasks">Tasks</a>
    <a href="/profile">Profile</a>
    <a href="/about">About</a>

    <br><br>

    <a href="<?= site_url('tasks/new') ?>">Add New Task</a>

    <br><br>

    <table border="1">
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Task Date</th>
            <th>Action</th>
        </tr>

        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['task_date']) ?></td>

                <td>
                    <a href="<?= site_url('tasks/edit/' . $task['id']) ?>">
                        Edit
                    </a>

                    <form
                        action="<?= site_url('tasks/archive/' . $task['id']) ?>"
                        method="post"
                        style="display:inline;"
                    >
                        <?= csrf_field() ?>

                        <button type="submit">
                            Archive
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>