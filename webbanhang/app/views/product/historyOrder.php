<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h3 class="mb-4">Lịch sử đơn hàng</h3>

    <div class="table-responsive">
        <table class="table table-hover border">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Mã Đơn</th>
                    <th>Ngày đặt</th>
                    <th>Tên khách hàng</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa chỉ</th>
                    <th>Xem chi tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $index => $order): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><strong><?= $order->order_id ?></strong></td>
                        <td><?= $order->created_at ?></td>
                        <td><strong><?= $order->name ?></strong></td>
                        <td><?= htmlspecialchars($order->user_phone) ?></td>
                        <td><?= htmlspecialchars($order->address) ?></td>
                        <td>
                            <a href="/webbanhang/Product/detailOrder/<?= $order->order_id ?>" class="btn btn-sm btn-outline-info">Xem</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php if (empty($orders)): ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">Không có đơn hàng nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>