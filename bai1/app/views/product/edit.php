<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8" />
<title>Sửa sản phẩm</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap');

  * {
    box-sizing: border-box;
  }

  body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    margin: 0;
    padding: 40px 15px;
    color: #222;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .form-container {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(12px);
    border-radius: 16px;
    padding: 40px 50px;
    max-width: 480px;
    width: 100%;
    box-shadow: 0 8px 32px rgba(0,0,0,0.12);
    color: #fff;
    border: 1px solid rgba(255, 255, 255, 0.3);
  }

  h1 {
    font-weight: 700;
    font-size: 2.8rem;
    margin-bottom: 35px;
    text-align: center;
    text-shadow: 0 2px 8px rgba(0,0,0,0.3);
  }

  label {
    display: block;
    font-weight: 600;
    margin-bottom: 10px;
    font-size: 1.1rem;
  }

  input[type="text"],
  input[type="number"],
  textarea {
    width: 100%;
    padding: 14px 20px;
    border-radius: 12px;
    border: none;
    background: rgba(255, 255, 255, 0.25);
    color: #222;
    font-size: 1.05rem;
    font-weight: 500;
    box-shadow: inset 2px 2px 6px rgba(255,255,255,0.6),
                inset -2px -2px 6px rgba(0,0,0,0.15);
    transition: background 0.3s ease, box-shadow 0.3s ease;
    resize: vertical;
    margin-bottom: 28px;
  }

  input[type="text"]:focus,
  input[type="number"]:focus,
  textarea:focus {
    background: rgba(255, 255, 255, 0.45);
    box-shadow: 0 0 12px 2px #a18cd1;
    outline: none;
    color: #000;
  }

  textarea {
    min-height: 130px;
  }

  button[type="submit"] {
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, #a18cd1, #fbc2eb);
    border: none;
    border-radius: 30px;
    font-weight: 700;
    font-size: 1.25rem;
    color: #42275a;
    cursor: pointer;
    box-shadow: 0 8px 20px rgba(161,140,209,0.6);
    transition: box-shadow 0.3s ease, transform 0.3s ease;
    user-select: none;
  }
  button[type="submit"]:hover {
    box-shadow: 0 12px 30px rgba(161,140,209,0.9);
    transform: translateY(-3px);
  }

  a.back-link {
    display: block;
    margin-top: 24px;
    text-align: center;
    font-weight: 600;
    color: #fbc2eb;
    font-size: 1.05rem;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  a.back-link:hover {
    color: #fff;
    text-decoration: underline;
  }

  @media (max-width: 480px) {
    .form-container {
      padding: 30px 20px;
      border-radius: 14px;
    }
    h1 {
      font-size: 2.2rem;
      margin-bottom: 28px;
    }
    button[type="submit"] {
      font-size: 1.1rem;
      padding: 14px;
    }
  }
</style>
</head>
<body>

<div class="form-container">
  <h1>Sửa sản phẩm</h1>
  <form method="POST" action="/bai1/Product/edit/<?php echo $product->getID(); ?>">
    <label for="name">Tên sản phẩm:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?>" required>

    <label for="description">Mô tả:</label>
    <textarea id="description" name="description" required><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></textarea>

    <label for="price">Giá:</label>
    <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?>" required min="0" step="0.01">

    <button type="submit">Lưu thay đổi</button>
  </form>
  <a href="/bai1/Product/list" class="back-link">← Quay lại danh sách sản phẩm</a>
</div>

</body>
</html>
