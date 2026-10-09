<!DOCTYPE html>
<html>
<head>
    <title>Add Product - POS System</title>
</head>
<body>

<h1>Add New Product</h1>

<?php if (session()->has('errors')): ?>
    <?php foreach (session('errors') as $error): ?>
        <p><?= esc($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<form
    action="<?= site_url('products/create') ?>"
    method="post"
    enctype="multipart/form-data"
>

    <?= csrf_field() ?>

    <label>Product Name:</label><br>
    <input
        type="text"
        name="name"
        value="<?= old('name') ?>"
    >

    <br><br>

    <label>Price:</label><br>
    <input
        type="number"
        name="price"
        step="0.01"
        min="0"
        value="<?= old('price') ?>"
    >

    <br><br>

    <label>Stock Quantity:</label><br>
    <input
        type="number"
        name="stock_quantity"
        min="0"
        value="<?= old('stock_quantity') ?>"
    >

    <br><br>

    <label>Product Image:</label><br>
    <input
        type="file"
        name="image"
        accept=".jpg,.jpeg,.png"
    >

    <br><br>

    <button type="submit">Add Product</button>

</form>

<br>

<a href="<?= site_url('products') ?>">Back to Products</a>

</body>
</html>