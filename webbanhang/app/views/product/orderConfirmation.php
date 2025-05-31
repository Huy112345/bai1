<?php include 'app/views/shares/header.php'; ?>

<style>
  body {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    color: #e0f7fa;
    font-family: Arial, sans-serif;
    padding: 40px;
    text-align: center;
  }

  h1 {
    font-size: 2.2rem;
    margin-bottom: 20px;
    color: #b2dfdb;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
  }

  p {
    font-size: 1.2rem;
    margin-bottom: 30px;
    color: #f1f8ff;
  }

  .btn-primary {
    padding: 10px 24px;
    border-radius: 10px;
    font-weight: bold;
    background: radial-gradient(circle at center, #00bcd4 0%, #0277bd 80%);
    border: none;
    box-shadow: 0 6px 18px rgba(0, 191, 255, 0.5);
    transition: all 0.3s ease;
    color: white;
  }

  .btn-primary:hover {
    filter: brightness(1.2);
    box-shadow: 0 8px 25px rgba(0, 191, 255, 0.7);
    transform: translateY(-2px);
  }
</style>

<h1>Xác nhận đơn hàng</h1>
<p>🎉 Cảm ơn bạn đã đặt hàng! Đơn hàng của bạn đã được xử lý thành công.</p>
<a  href="/webbanhang/Product/" class="btn btn-primary mt-2">Tiếp tục mua sắm</a>

<?php include 'app/views/shares/footer.php'; ?>
