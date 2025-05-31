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

  form {
    max-width: 600px;
    margin: auto;
    background: rgba(255, 255, 255, 0.08);
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.4);
  }

  label {
    font-weight: bold;
    color: #b2dfdb;
  }

  .form-control {
    background-color: rgba(255,255,255,0.1);
    color: #fff;
    border: 1px solid #b2dfdb;
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 20px;
  }

  .form-control:focus {
    background-color: rgba(255,255,255,0.15);
    outline: none;
    box-shadow: 0 0 8px #00bcd4;
    color: #fff;
  }

  button.btn-primary {
    background: linear-gradient(45deg, #00c6ff, #0072ff);
    border: none;
    padding: 12px 25px;
    color: white;
    font-weight: bold;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 5px 15px rgba(0, 114, 255, 0.6);
    transition: background 0.3s ease;
  }

  button.btn-primary:hover {
    background: linear-gradient(45deg, #0072ff, #00c6ff);
  }

  a.btn-secondary {
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    color: #b2dfdb;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    margin-top: 20px;
    box-shadow: 0 4px 12px rgba(0, 114, 255, 0.5);
    transition: background 0.3s ease, color 0.3s ease;
  }

  a.btn-secondary:hover {
    background: rgba(0, 114, 255, 0.7);
    color: white;
  }
</style>

<h1>Thanh toán</h1>
<form method="POST" action="/webbanhang/Product/processCheckout">
  <div class="form-group">
    <label for="name">Họ tên:</label>
    <input type="text" id="name" name="name" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="phone">Số điện thoại:</label>
    <input type="text" id="phone" name="phone" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="address">Địa chỉ:</label>
    <textarea id="address" name="address" class="form-control" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Thanh toán</button>
</form>

<div class="text-center">
  <a href="/webbanhang/Product/cart" class="btn btn-secondary mt-2">Quay lại giỏ hàng</a>
</div>

<?php include 'app/views/shares/footer.php'; ?>
