<!doctype html>
<html lang="en">
<head><meta charset="UTF-8"><title>Sales History</title></head>
<body>
    <h1>Sales History</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color:green"><?= esc(session()->getFlashdata('success')) ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead><tr>
            <th>Product</th><th>Customer</th><th>Staff</th>
            <th>Quantity</th><th>Total Price</th><th>Date</th>
        </tr></thead>
        <tbody>
        <?php if (! $sales): ?>
            <tr><td colspan="6">No sales recorded yet.</td></tr>
        <?php endif; ?>
        <?php foreach ($sales as $sale): ?>
            <tr>
                <td><?= esc($sale['product_name']) ?></td>
                <td><?= esc($sale['customer_name'] ?? 'Walk-in customer') ?></td>
                <td><?= esc($sale['staff_name']) ?></td>
                <td><?= esc($sale['quantity']) ?></td>
                <td><?= number_format((float) $sale['total_price'], 2) ?></td>
                <td><?= esc($sale['created_at']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <p><a href="<?= site_url('sales/new') ?>">Record another sale</a></p>
</body>
</html>
