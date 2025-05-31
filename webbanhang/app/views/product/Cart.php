<?php include 'app/views/shares/header.php'; ?>

<style>
  body {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    color: #f0f4f8;
    font-family: Arial, sans-serif;
    padding: 30px;
  }

  h1 {
    text-align: center;
    color: #e0f7fa;
    margin-bottom: 30px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
  }

  ul.list-group {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 25px;
    padding: 0;
    list-style: none;
  }

  .list-group-item {
    background-color: rgba(255, 255, 255, 0.08);
    border: none;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    color: #ffffff;
    aspect-ratio: 1 / 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: default;
    position: relative;
  }

  .list-group-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 114, 255, 0.7);
  }

  .list-group-item h2 {
    font-size: 1.2rem;
    margin-bottom: 12px;
    color: #b2dfdb;
    text-align: center;
  }

  .list-group-item img {
    max-width: 100px;
    max-height: 100px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.4);
    margin-bottom: 15px;
    object-fit: contain;
  }

  .list-group-item p {
    margin: 5px 0;
    color: #d1ecf1;
    text-align: center;
    font-weight: 600;
  }

  /* Nút Xóa sản phẩm */
  .btn-delete {
  position: absolute;
  bottom: 12px;    /* Góc phải dưới */
  right: 12px;
  background: #007bff;  /* Màu xanh dương */
  border: none;
  color: white;
  padding: 6px 12px;
  border-radius: 6px;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.3s ease;
  text-decoration: none;
}

  .btn-delete:hover {
    background: #800000;  /* Màu đỏ đậm hơn khi hover */
  }

  .btn {
    padding: 10px 20px;
    border-radius: 10px;
    font-weight: bold;
    border: none;
    margin: 10px 5px 0 5px;
    box-shadow: 0 5px 15px rgba(0,114,255,0.5);
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.15);
    color: #b2dfdb;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
  }

  .btn:hover {
    background: rgba(0, 114, 255, 0.7);
    color: #fff;
  }

  .btn-container {
    text-align: center;
    margin-top: 30px;
  }

  p.empty-cart {
    text-align: center;
    color: #e0f7fa;
    font-size: 1.2rem;
    margin-top: 40px;
  }
</style>

<h1>Giỏ hàng</h1>

<?php if (!empty($cart)): ?>
<ul class="list-group">
  <?php foreach ($cart as $id => $item): ?>
  <li class="list-group-item">
    <a href="/webbanhang/Product/removeFromCart/<?php echo $id; ?>" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?');">Xóa</a>

    <h2><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h2>

    <?php if (!empty($item['image'])): ?>
    <img src="/webbanhang/<?php echo $item['image']; ?>" alt="Product Image">
    <?php else: ?>
    <img src="/webbanhang/images/no-image.png" alt="No Image">
    <?php endif; ?>

    <p>Giá: <?php echo number_format($item['price'], 0, ',', '.'); ?> VND</p>
    <p>Số lượng: <?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></p>
  </li>
  <?php endforeach; ?>
</ul>

<div class="btn-container">
  <a href="/webbanhang/Product" class="btn">Tiếp tục mua sắm</a>
  <a href="/webbanhang/Product/checkout" class="btn">Thanh Toán</a>
</div>

<?php else: ?>
<p class="empty-cart">🛒 Giỏ hàng của bạn đang trống.</p>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>
