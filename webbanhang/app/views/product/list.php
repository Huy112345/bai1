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

  /* Dùng chung cho tất cả nút */
.btn-success, .btn-info, .btn-warning, .btn-danger {
  background: linear-gradient(45deg, #00c6ff, #0072ff);
  border: none;
  padding: 8px 15px;
  border-radius: 6px;
  color: white;
  font-weight: bold;
  text-decoration: none;
  cursor: pointer;
  box-shadow: 0 4px 6px rgba(0,114,255,0.5);
  transition: background 0.3s ease;
  margin-right: 10px;
  width: 80px;
  text-align: center;
}

.btn-success {
  padding: 10px 20px;
  margin-bottom: 20px;
  width: auto;
}

.btn-success:hover,
.btn-info:hover,
.btn-warning:hover,
.btn-danger:hover {
  background: linear-gradient(45deg, #0072ff, #00c6ff);
}


  /* Grid container for product list */
  .list-group {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    max-width: 900px;
    margin: 0 auto;
    padding: 0;
    list-style: none;
  }

  /* Each product box */
  .list-group-item {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    padding: 20px;
    transition: transform 0.2s ease, background 0.3s ease;
    color: #e0f2f1;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .list-group-item:hover {
    transform: translateY(-5px);
    background: rgba(0, 114, 255, 0.3);
    box-shadow: 0 10px 25px rgba(0, 114, 255, 0.6);
  }

  .list-group-item img {
    max-width: 150px;
    height: auto;
    border-radius: 10px;
    margin-bottom: 15px;
    box-shadow: 0 4px 8px rgba(0, 114, 255, 0.5);
  }

  .list-group-item h2 {
    margin-bottom: 10px;
  }

  .list-group-item p {
    margin: 5px 0;
  }

  .list-group-item a.btn {
    margin: 5px 5px 0 5px;
    width: 80px;
    text-align: center;
  }
</style>

<h1>Danh sách sản phẩm</h1>

<a href="/webbanhang/Product/add" class="btn btn-success mb-2">Thêm sản phẩm mới</a>

<ul class="list-group">
<?php foreach ($products as $product): ?>
    <li class="list-group-item">
  <h2>
    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
  </h2>

  <?php if ($product->image): ?>
    <img src="/webbanhang/<?php echo $product->image; ?>" alt="Product Image">
  <?php endif; ?>

  <p><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
  <p>Giá: <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> VND</p>
  <p>Danh mục: <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>

  <div class="btn-group">
    <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="btn btn-info">Chi tiết</a>
    <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning">Sửa</a>
    <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
  </div>
</li>

<?php endforeach; ?>
</ul>

<?php include 'app/views/shares/footer.php'; ?>
