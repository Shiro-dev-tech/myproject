<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>

<h1>Edit Task</h1>

<?php if (session()->has('errors')): ?>
    <?php foreach (session('errors') as $error): ?>
        <p><?= esc($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<form action="<?= site_url('tasks/update/' . $task['id']) ?>" method="post">

    <?= csrf_field() ?>

    <label>Title:</label><br>
    <input
        type="text"
        name="title"
        value="<?= old('title', $task['title']) ?>"
    >

    <br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="pending"
            <?= old('status', $task['status']) === 'pending' ? 'selected' : '' ?>>
            Pending
        </option>

        <option value="completed"
            <?= old('status', $task['status']) === 'completed' ? 'selected' : '' ?>>
            Completed
        </option>
    </select>

    <br><br>

    <label>Task Date:</label><br>
    <input
        type="date"
        name="task_date"
        value="<?= old('task_date', $task['task_date']) ?>"
    >

    <br><br>

    <button type="submit">Update Task</button>

</form>

<br>

<a href="<?= site_url('tasks') ?>">Back to Task List</a>

</body>
</html>