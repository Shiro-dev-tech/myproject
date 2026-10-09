<!DOCTYPE html>
<html>
<head>
    <title>Customer Management - POS System</title>
</head>
<body>

<h1>Customer Management</h1>

<a href="<?= site_url('customers/new') ?>">Add New Customer</a>

<br><br>

<table border="1">
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>

    <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= esc($customer['full_name']) ?></td>
            <td><?= esc($customer['email']) ?></td>
            <td><?= esc($customer['phone']) ?></td>

            <td>
                <a href="<?= site_url('customers/edit/' . $customer['id']) ?>">
                    Edit
                </a>

                <form
                    action="<?= site_url('customers/delete/' . $customer['id']) ?>"
                    method="post"
                    style="display:inline;"
                >
                    <?= csrf_field() ?>
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>