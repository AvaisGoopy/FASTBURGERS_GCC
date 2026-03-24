<?php
// This view displays a list of orders.
?>
<h1>Orders</h1>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Item</th>
        <th>Price (£)</th>
    </tr>

    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?= $order['id'] ?></td>
        <td><?= $order['item'] ?></td>
        <td><?= number_format($order['price'], 2) ?></td>
    </tr>
    <?php endforeach; ?>
</table>