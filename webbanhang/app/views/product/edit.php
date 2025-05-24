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

  .alert-danger {
    background-color: rgba(255, 77, 79, 0.8);
    color: white;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 20px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
  }

  form {
    max-width: 600px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.1);
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    color: #b2dfdb;
  }

  label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
  }

  .form-control {
    width: 100%;
    padding: 8px 12px;
    margin-bottom: 20px;
    border-radius: 8px;
    border: none;
    background: rgba(255, 255, 255, 0.2);
    color: #e0f7fa;
    box-shadow: inset 0 0 5px rgba(0, 114, 255, 0.6);
    font-size: 16px;
    transition: background 0.3s ease;
  }

  .form-control:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.4);
    box-shadow: 0 0 8px rgba(0, 114, 255, 0.9);
    color: #004d40;
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

  img {
    margin-top: 10px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
  }
</style>
<h1>Sửa sản phẩm</h1>
<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
<ul>
<?php foreach ($errors as $error): ?>
<li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>
<form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data"
onsubmit="return validateForm();">
<input type="hidden" name="id" value="<?php echo $product->id; ?>">
<div class="form-group">
<label for="name">Tên sản phẩm:</label>
<input type="text" id="name" name="name" class="form-control" value="<?php
echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
</div>
<div class="form-group">
<label for="description">Mô tả:</label>
<textarea id="description" name="description" class="form-control"
required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8');
?></textarea>
</div>
<div class="form-group">
<label for="price">Giá:</label>
<input type="number" id="price" name="price" class="form-control" step="0.01"
value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>"
required>
</div>
<div class="form-group">
<label for="category_id">Danh mục:</label>
<select id="category_id" name="category_id" class="form-control" required>
<?php foreach ($categories as $category): ?>
<option value="<?php echo $category->id; ?>" <?php echo $category->id
== $product->category_id ? 'selected' : ''; ?>>
<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8');
?>
</option>
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label for="image">Hình ảnh:</label>
<input type="file" id="image" name="image" class="form-control">
<input type="hidden" name="existing_image" value="<?php echo $product->image;
?>">
<?php if ($product->image): ?>
<img src="/<?php echo $product->image; ?>" alt="Product Image" style="maxwidth: 100px;">
<?php endif; ?>
</div>
<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>
<a href="/webbanhang/Product/list" class="btn btn-secondary mt-2">Quay lại danh sách
sản phẩm</a>
<?php include 'app/views/shares/footer.php'; ?>