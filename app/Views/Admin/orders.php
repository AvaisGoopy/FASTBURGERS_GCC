<?php
$title = 'Manage Orders - Fast Burgers';
?>

<div class="min-h-screen bg-slate-100 py-8">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-6 rounded-3xl bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-semibold text-slate-900">Manage Orders</h1>
                    <p class="mt-2 text-sm text-slate-500">View each order, update its customer and outlet, or delete orders as needed.</p>
                </div>
                <a href="/admin-dashboard" class="inline-flex items-center rounded-2xl bg-slate-950 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800 transition">Back to Admin Dashboard</a>
            </div>
        </div>

        <?php if (!empty($message)): ?>
            <div class="mb-6 rounded-2xl border border-emerald-300 bg-emerald-50 px-5 py-4 text-sm text-emerald-800"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="mb-6 rounded-2xl border border-rose-300 bg-rose-50 px-5 py-4 text-sm text-rose-800"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <div class="overflow-hidden rounded-3xl bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
                    <thead class="bg-slate-50 text-slate-900">
                        <tr>
                            <th class="px-4 py-4 text-left font-medium">Order</th>
                            <th class="px-4 py-4 text-left font-medium">Customer</th>
                            <th class="px-4 py-4 text-left font-medium">Email</th>
                            <th class="px-4 py-4 text-left font-medium">Outlet</th>
                            <th class="px-4 py-4 text-left font-medium">Payment</th>
                            <th class="px-4 py-4 text-left font-medium">Taken by</th>
                            <th class="px-4 py-4 text-left font-medium">Date</th>
                            <th class="px-4 py-4 text-left font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        <?php if (empty($orders)): ?>
                            <tr>
                                <td colspan="8" class="px-4 py-6 text-center text-slate-500">No orders found.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($orders as $order): ?>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-4 font-medium">#<?= htmlspecialchars($order['order_id']) ?></td>
                                    <td class="px-4 py-4"><?= htmlspecialchars($order['customer_name']) ?></td>
                                    <td class="px-4 py-4"><?= htmlspecialchars($order['customer_email']) ?></td>
                                    <td class="px-4 py-4"><?= htmlspecialchars($order['outlet_location']) ?></td>
                                    <td class="px-4 py-4"><?= htmlspecialchars($order['payment_type']) ?></td>
                                    <td class="px-4 py-4"><?= htmlspecialchars($order['staff_name']) ?><?= !empty($order['staff_role']) ? ' (' . htmlspecialchars($order['staff_role']) . ')' : '' ?></td>
                                    <td class="px-4 py-4"><?= htmlspecialchars($order['order_timestamp']) ?></td>
                                    <td class="px-4 py-4">
                                        <div class="flex flex-wrap gap-2">
                                            <a href="/admin/orders?edit=<?= htmlspecialchars($order['order_id']) ?>" class="rounded-2xl bg-slate-950 px-3 py-2 text-xs font-semibold text-white hover:bg-slate-800 transition">Edit</a>
                                            <form method="POST" class="inline" onsubmit="return confirm('Delete order #<?= htmlspecialchars($order['order_id']) ?>?');">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="order_id" value="<?= htmlspecialchars($order['order_id']) ?>">
                                                <button type="submit" class="rounded-2xl bg-rose-600 px-3 py-2 text-xs font-semibold text-white hover:bg-rose-700 transition">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php if (!empty($selectedOrder)): ?>
            <div class="mt-8 rounded-3xl bg-white p-6 shadow-sm">
                <h2 class="text-2xl font-semibold text-slate-900">Edit Order #<?= htmlspecialchars($selectedOrder['order_id']) ?></h2>
                <p class="mt-2 text-sm text-slate-500">Update the customer, outlet, or payment method.</p>

                <div class="mt-6 grid gap-6 lg:grid-cols-2">
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <h3 class="text-sm font-semibold text-slate-700">Order details</h3>
                        <dl class="mt-4 grid gap-4 text-sm text-slate-600">
                            <div>
                                <dt class="font-medium text-slate-900">Order ID</dt>
                                <dd>#<?= htmlspecialchars($selectedOrder['order_id']) ?></dd>
                            </div>
                            <div>
                                <dt class="font-medium text-slate-900">Customer</dt>
                                <dd><?= htmlspecialchars($selectedOrder['customer_name']) ?></dd>
                            </div>
                            <div>
                                <dt class="font-medium text-slate-900">Email</dt>
                                <dd><?= htmlspecialchars($selectedOrder['customer_email']) ?></dd>
                            </div>
                            <div>
                                <dt class="font-medium text-slate-900">Outlet</dt>
                                <dd><?= htmlspecialchars($selectedOrder['outlet_location']) ?></dd>
                            </div>
                            <div>
                                <dt class="font-medium text-slate-900">Payment</dt>
                                <dd><?= htmlspecialchars($selectedOrder['payment_type']) ?></dd>
                            </div>
                            <div>
                                <dt class="font-medium text-slate-900">Ordered At</dt>
                                <dd><?= htmlspecialchars($selectedOrder['order_timestamp']) ?></dd>
                            </div>
                        </dl>
                    </div>

                    <form method="POST" action="/admin/orders?edit=<?= htmlspecialchars($selectedOrder['order_id']) ?>" class="rounded-3xl bg-slate-50 p-5">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="order_id" value="<?= htmlspecialchars($selectedOrder['order_id']) ?>">

                        <div class="space-y-4">
                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-700" for="customer_id">Customer</label>
                                <select id="customer_id" name="customer_id" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-slate-500 focus:outline-none">
                                    <?php foreach ($customers as $customer): ?>
                                        <option value="<?= htmlspecialchars($customer['customer_id']) ?>" <?= $customer['customer_id'] == $selectedOrder['customer_id'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($customer['customer_name']) ?> &mdash; <?= htmlspecialchars($customer['customer_email']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-700" for="outlet_id">Outlet</label>
                                <select id="outlet_id" name="outlet_id" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-slate-500 focus:outline-none">
                                    <?php foreach ($outlets as $outlet): ?>
                                        <option value="<?= htmlspecialchars($outlet['outlet_id']) ?>" <?= $outlet['outlet_id'] == $selectedOrder['outlet_id'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($outlet['outlet_location']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-700" for="payment_type">Payment Type</label>
                                <select id="payment_type" name="payment_type" class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-slate-500 focus:outline-none">
                                    <option value="CARD" <?= $selectedOrder['payment_type'] === 'CARD' ? 'selected' : '' ?>>Card</option>
                                    <option value="CASH" <?= $selectedOrder['payment_type'] === 'CASH' ? 'selected' : '' ?>>Cash</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full rounded-2xl bg-slate-950 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800 transition">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
