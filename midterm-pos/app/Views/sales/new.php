<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Record Sale</title>
</head>
<body>

    <h1>Record Sale</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red">
            <?= esc(session()->getFlashdata('error')) ?>
        </p>
    <?php endif; ?>

    <form method="post" action="<?= site_url('sales/create') ?>">

        <?= csrf_field() ?>

        <label>Product</label><br>

        <select name="product_id" required>
            <option value="">Select a product</option>

            <?php foreach ($products as $product): ?>
                <option
                    value="<?= esc($product['id']) ?>"
                    <?= old('product_id') == $product['id'] ? 'selected' : '' ?>
                    <?= $product['stock_quantity'] == 0 ? 'disabled' : '' ?>
                >
                    <?= esc($product['name']) ?>
                    - ₱<?= number_format($product['price'], 2) ?>
                    (Stock: <?= esc($product['stock_quantity']) ?>)
                </option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <label>Customer (optional)</label><br>

        <select name="customer_id">
            <option value="">Walk-in customer</option>

            <?php foreach ($customers as $customer): ?>
                <option
                    value="<?= esc($customer['id']) ?>"
                    <?= old('customer_id') == $customer['id'] ? 'selected' : '' ?>
                >
                    <?= esc($customer['full_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <label>Quantity</label><br>

        <input
            type="number"
            name="quantity"
            min="1"
            value="<?= esc(old('quantity', 1)) ?>"
            required
        >

        <br><br>

        <button type="submit">Record Sale</button>

    </form>

    <p>
        <a href="<?= site_url('sales/history') ?>">
            View Sales History
        </a>
    </p>

</body>
</html>