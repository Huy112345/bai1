<?php
$errors = [];
$imagePath = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Lấy dữ liệu từ form
  $name = trim($_POST['name']);
  $description = trim($_POST['description']);
  $price = floatval($_POST['price']);

  // Kiểm tra dữ liệu
  if (strlen($name) < 10 || strlen($name) > 100) {
    $errors[] = 'Tên sản phẩm phải từ 10 đến 100 ký tự.';
  }

  if ($price <= 0 || !is_numeric($price)) {
    $errors[] = 'Giá phải là một số dương lớn hơn 0.';
  }

  // Xử lý upload ảnh
  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0777, true);
    }

    $fileTmp = $_FILES['image']['tmp_name'];
    $fileName = time() . '_' . basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $fileName;
    $imagePath = 'uploads/' . $fileName;

    if (!move_uploaded_file($fileTmp, $targetPath)) {
      $errors[] = 'Tải ảnh lên thất bại.';
    }
  } else {
    $errors[] = 'Vui lòng chọn ảnh sản phẩm.';
  }

  if (empty($errors)) {
    echo "<h2 style='color: green;'>Sản phẩm đã được thêm thành công!</h2>";
    echo "<p><strong>Tên:</strong> " . htmlspecialchars($name) . "</p>";
    echo "<p><strong>Giá:</strong> " . number_format($price, 0, ',', '.') . " VNĐ</p>";
    echo "<p><strong>Mô tả:</strong> " . nl2br(htmlspecialchars($description)) . "</p>";
    echo "<p><strong>Hình ảnh:</strong><br><img src='$imagePath' style='max-width:300px;border-radius:12px;'></p>";
    echo '<a href="add_product.php" style="display:inline-block;margin-top:20px;color:#fff;background:#764ba2;padding:10px 20px;border-radius:8px;text-decoration:none;">← Thêm sản phẩm khác</a>';
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Thêm sản phẩm mới</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap');
    * { box-sizing: border-box; }
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      margin: 0; padding: 40px 15px; color: #fff;
      min-height: 100vh; display: flex; justify-content: center; align-items: center;
    }
    .form-container {
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(12px);
      padding: 40px; border-radius: 16px;
      max-width: 500px; width: 100%;
      box-shadow: 0 8px 32px rgba(0,0,0,0.12);
    }
    h1 { text-align: center; font-size: 2.5rem; margin-bottom: 25px; }
    label { font-weight: 600; margin: 10px 0 5px; display: block; }
    input[type="text"], input[type="number"], textarea, input[type="file"] {
      width: 100%; padding: 12px; margin-bottom: 15px;
      border-radius: 10px; border: none;
      background: rgba(255,255,255,0.2); color: #000;
    }
    button {
      width: 100%; padding: 15px;
      background: linear-gradient(135deg, #a18cd1, #fbc2eb);
      border: none; border-radius: 30px;
      font-weight: bold; font-size: 1.2rem;
      cursor: pointer; color: #42275a;
    }
    .error-list {
      background: #ffe2e2; color: #b10000;
      padding: 15px; margin-bottom: 20px;
      border: 1px solid #ffbdbd; border-radius: 8px;
    }
    img#preview {
      display: none; margin-top: 15px; max-width: 100%; border-radius: 10px;
    }
  </style>
  <script>
    function previewImage(event) {
      const file = event.target.files[0];
      const preview = document.getElementById('preview');
      if (file) {
        const reader = new FileReader();
        reader.onload = e => {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
      }
    }
  </script>
</head>
<body>
  <div class="form-container">
    <h1>Thêm sản phẩm mới</h1>

    <?php if (!empty($errors)): ?>
      <div class="error-list">
        <ul>
          <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
      <label for="name">Tên sản phẩm:</label>
      <input type="text" id="name" name="name" required>

      <label for="description">Mô tả:</label>
      <textarea id="description" name="description" required></textarea>

      <label for="price">Giá (VNĐ):</label>
      <input type="number" id="price" name="price" step="0.01" required>

      <label for="image">Hình ảnh sản phẩm:</label>
      <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
      <img id="preview" src="#" alt="Xem trước ảnh" />

      <button type="submit">Thêm sản phẩm</button>
    </form>
  </div>
</body>
</html>
