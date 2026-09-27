<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts - POS System</title>
</head>
<body>

    <h1>Customer Accounts</h1>

    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/customers">Customers</a>
    <a href="/users">Users</a>

    <br><br>

    <table border="1">
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>

        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $customer['name'] ?></td>
                <td><?= $customer['email'] ?></td>
                <td><?= $customer['phone'] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>