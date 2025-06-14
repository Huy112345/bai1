<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h3 class="mb-4">Chi tiết đơn hàng</h3>

    <div class="table-responsive">
        <table class="table table-hover border">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Mã Hàng</th>
                    <th>Description</th>
                    <th>Đơn Giá</th>
                    <th>Hình Ảnh</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $index => $order): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><strong><?= $order->id ?></strong></td>
                        <td><?= htmlspecialchars($order->description) ?></td>
                        <td><?= htmlspecialchars($order->price) ?></td>
                        <td>
                            <img src="/webbanhang_labs/<?= htmlspecialchars($order->image) ?>" alt="ProductImage" style="max-width: 200px;">
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php if (empty($orders)): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">Không có đơn hàng nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>