<?php include 'app/views/shares/header.php'; ?>

<style>
  body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    padding: 20px;
    color: #f0f4f8;
  }

  h1 {
    color: #e0f7fa;
    text-align: center;
    margin-bottom: 30px;
    text-shadow: 0 1px 3px rgba(0,0,0,0.6);
  }

  .btn {
    padding: 10px 20px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: bold;
    margin-right: 10px;
    box-shadow: 0 6px 15px rgba(0, 114, 255, 0.6);
    transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
    display: inline-block;
    cursor: pointer;
    user-select: none;
    border: none;
    background: linear-gradient(45deg, #00c6ff, #0072ff);
    color: white;
  }

  .btn:hover {
    background: linear-gradient(45deg, #0072ff, #00c6ff);
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 114, 255, 0.8);
  }

  .btn:active {
    transform: translateY(1px);
    box-shadow: 0 4px 12px rgba(0, 114, 255, 0.6);
  }

  .btn:focus {
    outline: none;
    box-shadow: 0 0 12px 4px rgba(0, 114, 255, 0.8);
  }

  /* Grid container cho các sản phẩm */
  .container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Tự động điều chỉnh cột */
    gap: 20px;
    padding: 10px 0;
  }

  .product-card {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    padding: 20px;

    aspect-ratio: 1 / 1; /* Giữ tỉ lệ vuông */

    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .product-card h2 a {
    color: #f1f8ff;
    text-decoration: none;
    margin-bottom: 10px;
    font-size: 1.2rem;
    text-align: center;
  }

  .product-card img {
    max-width: 120px;
    max-height: 120px;
    margin: 0 auto 15px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
    object-fit: contain;
  }

  .product-card p {
    color: #d1ecf1;
    margin: 5px 0;
    text-align: center;
    flex-grow: 1;
  }

  .product-card .btn {
    margin-top: 10px;
    width: 100%;
    font-weight: 600;
  }
  .product-card {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
  padding: 20px;

  aspect-ratio: 1 / 1;

  display: flex;
  flex-direction: column;
  justify-content: space-between;

  transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
  cursor: pointer;
}

.product-card:hover {
  background: rgba(255, 255, 255, 0.2);
  box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
  transform: translateY(-8px) scale(1.03);
  z-index: 10;
}

</style>

<h1>Danh sách sản phẩm</h1>


<div class="container">
  <?php foreach ($products as $product): ?>
    <div class="product-card">
      <h2>
        <a href="/webbanhang/Product/show/<?php echo $product->id; ?>">
          <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
        </a>
      </h2>

      <?php if ($product->image): ?>
        <img src="/webbanhang/<?php echo $product->image; ?>" alt="Hình sản phẩm">
      <?php endif; ?>

      <p><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
      <p>Giá: <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> VND</p>
      <p>Danh mục: <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>

      <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn">Sửa</a>
      <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" class="btn" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
      <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" class="btn">Thêm vào giỏ hàng</a>
    </div>
  <?php endforeach; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>
