<?php include 'app/views/shares/header.php'; ?>
<style>
  body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    padding: 20px;
    color: #f0f4f8;
  }

  .card {
    background-color: rgba(255, 255, 255, 0.1);
    border: none;
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
  }

  .card-header {
    background: linear-gradient(45deg, #00c6ff, #0072ff) !important;
    border-radius: 16px 16px 0 0;
    padding: 20px;
  }

  .card-body {
    padding: 30px;
  }

  .card-title {
    color: #f0f8ff;
    font-size: 24px;
    margin-bottom: 15px;
  }

  .card-text, .card-body p {
    color: #d1ecf1;
    font-size: 16px;
  }

  .badge.bg-info {
    background-color: #00bcd4 !important;
    font-size: 14px;
    padding: 5px 10px;
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
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 114, 255, 0.8);
  }

  .btn:active {
    transform: translateY(1px);
    box-shadow: 0 4px 12px rgba(0, 114, 255, 0.6);
  }

  .alert-danger {
    background-color: rgba(255, 0, 0, 0.1);
    border: none;
    color: #ffdddd;
    padding: 30px;
    border-radius: 12px;
  }

  .img-fluid {
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.5);
  }
</style>

<div class="container mt-4">
<div class="card shadow-lg">
<div class="card-header bg-primary text-white text-center">
<h2 class="mb-0">Chi tiết sản phẩm</h2>
</div>
<div class="card-body">
<?php if ($product): ?>
<div class="row">
<div class="col-md-6">
<?php if ($product->image): ?>
<img src="/webbanhang/<?php echo
htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
class="img-fluid rounded" alt="<?php echo
htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>">
<?php else: ?>
<img src="/webbanhang/images/no-image.png"
class="img-fluid rounded" alt="Không có ảnh">
<?php endif; ?>
</div>
<div class="col-md-6">
<h3 class="card-title text-dark font-weight-bold">
<?php echo htmlspecialchars($product->name, ENT_QUOTES,
'UTF-8'); ?>
</h3>
<p class="card-text">
<?php echo nl2br(htmlspecialchars($product->description,
ENT_QUOTES, 'UTF-8')); ?>
</p>
<p class="text-danger font-weight-bold h4">
💰 <?php echo number_format($product->price, 0, ',', '.');
?> VND
</p>
<p><strong>Danh mục:</strong>
<span class="badge bg-info text-white">
<?php echo !empty($product->category_name) ?
htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Chưa có danh mục';
?>
</span>
</p>
<div class="mt-4">
<a href="/webbanhang/Product/addToCart/<?php echo
$product->id; ?>"
class="btn btn-success px-4">➕ Thêm vào giỏ hàng</a>
<a href="/webbanhang/Product/" class="btn btnsecondary px-4 ml-2">Quay lại danh sách</a>
</div>
</div>
</div>
<?php else: ?>
<div class="alert alert-danger text-center">
<h4>Không tìm thấy sản phẩm!</h4>
</div>
<?php endif; ?>
</div>
</div>
</div>
<?php include 'app/views/shares/footer.php'; ?>