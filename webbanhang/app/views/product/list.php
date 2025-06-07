<?php include 'app/views/shares/header.php'; ?>

<style>
  :root {
    --primary-color: #0072ff;
    --secondary-color: #00c6ff;
    --btn-radius: 12px;
    --shadow-color: rgba(0, 114, 255, 0.6);
  }

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
    padding: 12px 25px;
    border-radius: var(--btn-radius);
    text-decoration: none;
    font-weight: 700;
    margin-right: 10px;
    box-shadow: 0 6px 20px var(--shadow-color);
    transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
    display: inline-block;
    cursor: pointer;
    user-select: none;
    border: none;
    background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
    color: white;
  }

  .btn:hover {
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 10px 30px var(--shadow-color);
  }

  .btn:active {
    transform: translateY(1px) scale(0.97);
    box-shadow: 0 5px 15px var(--shadow-color);
  }

  .btn:focus {
    outline: none;
    box-shadow: 0 0 15px 5px var(--shadow-color);
  }

  /* Riêng nút sửa và xóa có màu khác */
  .btn-warning {
    background: linear-gradient(45deg, #ffc107, #ff9800);
    box-shadow: 0 6px 20px rgba(255, 152, 0, 0.6);
    color: #2c2c2c;
  }
  .btn-warning:hover {
    background: linear-gradient(45deg, #ff9800, #ffc107);
    box-shadow: 0 10px 30px rgba(255, 152, 0, 0.8);
  }

  .btn-danger {
    background: linear-gradient(45deg, #f44336, #d32f2f);
    box-shadow: 0 6px 20px rgba(211, 47, 47, 0.6);
    color: white;
  }
  .btn-danger:hover {
    background: linear-gradient(45deg, #d32f2f, #f44336);
    box-shadow: 0 10px 30px rgba(211, 47, 47, 0.8);
  }

  .container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    padding: 10px 0;
  }

  .product-card {
    background: rgba(255, 255, 255, 0.12);
    border-radius: 16px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
    padding: 20px;
    aspect-ratio: 1 / 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.4s ease;
    cursor: pointer;
  }

  .product-card:hover {
    background: rgba(255, 255, 255, 0.3);
    box-shadow: 0 12px 45px rgba(0, 0, 0, 0.6);
    transform: translateY(-10px) scale(1.07);
    z-index: 15;
  }

  .product-card img {
    max-width: 120px;
    max-height: 120px;
    margin: 0 auto 15px;
    border-radius: 12px;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.5);
    object-fit: contain;
    transition: transform 0.3s ease;
  }

  .product-card:hover img {
    transform: scale(1.1);
  }

  .product-card h2 a {
    color: #f1f8ff;
    text-decoration: none;
    font-size: 1.2rem;
    text-align: center;
    display: block;
    margin-bottom: 10px;
  }

  .product-card p {
    color: #d1ecf1;
    margin: 5px 0;
    text-align: center;
    flex-grow: 1;
  }

  .action-buttons {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  /* Responsive cho mobile */
  @media (max-width: 600px) {
    .container {
      grid-template-columns: 1fr !important;
    }
    .btn {
      padding: 10px 15px;
      font-size: 14px;
    }
    .product-card img {
      max-width: 100px;
      max-height: 100px;
    }
  }

  /* Modal confirm */
  #confirmModal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.6);
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }
  #confirmModal.active {
    display: flex;
  }
  #confirmModal .modal-content {
    background: #fff;
    padding: 20px 30px;
    border-radius: 12px;
    max-width: 400px;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0,0,0,0.3);
  }
  #confirmModal p {
    font-size: 18px;
    margin-bottom: 20px;
    color: #333;
  }
  #confirmModal button {
    margin: 0 10px;
    min-width: 100px;
  }
</style>

<h1>Danh sách sản phẩm</h1>

<div class="container">
  <?php foreach ($products as $product): ?>
    <div class="product-card">
      <img src="/webbanhang/<?php echo htmlspecialchars($product->image); ?>" alt="<?php echo htmlspecialchars($product->name); ?>">
      <h2><a href="/webbanhang/Product/show/<?php echo $product->id; ?>"><?php echo htmlspecialchars($product->name); ?></a></h2>
      <p><?php echo number_format($product->price); ?> VNĐ</p>

      <div class="action-buttons">
        <?php if (SessionHelper::isAdmin()): ?>
          <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning btn-sm" title="Sửa sản phẩm">
            <i class="fas fa-edit me-1"></i> Sửa
          </a>
          <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger btn-sm" data-confirm="true" title="Xóa sản phẩm">
            <i class="fas fa-trash me-1"></i> Xóa
          </a>
        <?php endif; ?>

        <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary btn-sm" title="Thêm vào giỏ hàng">
          <i class="fas fa-cart-plus me-1"></i> Thêm vào giỏ
        </a>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<!-- Modal confirm -->
<div id="confirmModal">
  <div class="modal-content">
    <p>Bạn có chắc chắn muốn xóa sản phẩm này?</p>
    <button id="confirmYes" class="btn btn-danger">Xóa</button>
    <button id="confirmNo" class="btn btn-secondary">Hủy</button>
  </div>
</div>

<script>
  (() => {
    const modal = document.getElementById('confirmModal');
    const btnYes = document.getElementById('confirmYes');
    const btnNo = document.getElementById('confirmNo');
    let hrefToDelete = null;

    document.querySelectorAll('a[data-confirm="true"]').forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        hrefToDelete = this.href;
        modal.classList.add('active');
      });
    });

    btnYes.addEventListener('click', () => {
      if (hrefToDelete) {
        window.location.href = hrefToDelete;
      }
    });

    btnNo.addEventListener('click', () => {
      modal.classList.remove('active');
      hrefToDelete = null;
    });

    // Optional: đóng modal khi click ra ngoài content
    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.classList.remove('active');
        hrefToDelete = null;
      }
    });
  })();
</script>

<?php include 'app/views/shares/footer.php'; ?>
