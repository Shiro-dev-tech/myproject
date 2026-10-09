<!DOCTYPE html>
<html>
<head>
    <title>Edit Product - POS System</title>
</head>
<body>

<h1>Edit Product</h1>

<?php if (session()->has('errors')): ?>
    <?php foreach (session('errors') as $error): ?>
        <p><?= esc($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (!empty($product['image'])): ?>
    <p>Current Image:</p>

    <img
        src="<?= base_url('uploads/products/' . $product['image']) ?>"
        width="120"
        height="120"
        alt="Product Image"
    >

    <br><br>
<?php endif; ?>

<form
    action="<?= site_url('products/update/' . $product['id']) ?>"
    method="post"
    enctype="multipart/form-data"
>

    <?= csrf_field() ?>

    <label>Product Name:</label><br>
    <input
        type="text"
        name="name"
        value="<?= old('name', $product['name']) ?>"
    >

    <br><br>

    <label>Price:</label><br>
    <input
        type="number"
        name="price"
        step="0.01"
        min="0"
        value="<?= old('price', $product['price']) ?>"
    >

    <br><br>

    <label>Stock Quantity:</label><br>
    <input
        type="number"
        name="stock_quantity"
        min="0"
        value="<?= old('stock_quantity', $product['stock_quantity']) ?>"
    >

    <br><br>

    <label>Replace Product Image:</label><br>
    <input
        type="file"
        name="image"
        accept=".jpg,.jpeg,.png"
    >

    <br><br>

    <button type="submit">Update Product</button>

</form>

<br>

<a href="<?= site_url('products') ?>">Back to Products</a>

</body>
</html>s