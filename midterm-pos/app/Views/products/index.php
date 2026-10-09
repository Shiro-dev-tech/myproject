<!DOCTYPE html>
<html>
<head>
    <title>Product Management - POS System</title>
</head>
<body>

<h1>Product Management</h1>

<a href="<?= site_url('products/new') ?>">Add New Product</a>

<br><br>

<table border="1">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Action</th>
    </tr>

    <?php foreach ($products as $product): ?>
        <tr>
            <td>
                <?php if (!empty($product['image'])): ?>
                    <img
                        src="<?= base_url('uploads/products/' . $product['image']) ?>"
                        width="80"
                        height="80"
                        alt="Product Image"
                    >
                <?php else: ?>
                    No Image
                <?php endif; ?>
            </td>

            <td><?= esc($product['name']) ?></td>
            <td>₱<?= number_format((float) $product['price'], 2) ?></td>
            <td><?= esc($product['stock_quantity']) ?></td>

            <td>
                <a href="<?= site_url('products/edit/' . $product['id']) ?>">
                    Edit
                </a>

                <form
                    action="<?= site_url('products/delete/' . $product['id']) ?>"
                    method="post"
                    style="display:inline;"
                >
                    <?= csrf_field() ?>
                    <button type="submit">Archive</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>