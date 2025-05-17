<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8" />
<title>Danh sách sản phẩm</title>
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

  .container {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(12px);
    border-radius: 16px;
    padding: 40px 50px;
    max-width: 600px;
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

  ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  li {
    background: rgba(255, 255, 255, 0.25);
    padding: 20px 25px;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: inset 2px 2px 6px rgba(255,255,255,0.6),
                inset -2px -2px 6px rgba(0,0,0,0.15);
    color: #222;
  }

  li h2 {
    margin: 0 0 12px;
    font-size: 1.6rem;
    color: #2c3e50;
  }

  li p {
    margin: 0 0 10px;
    font-size: 1.05rem;
    color: #333;
  }

  p.price {
    font-weight: 600;
    font-size: 1.1rem;
    color: #27ae60;
  }

  .actions {
    margin-top: 12px;
  }

  .actions a {
    display: inline-block;
    text-decoration: none;
    font-weight: 700;
    padding: 12px 24px;
    border-radius: 30px;
    margin-right: 12px;
    cursor: pointer;
    user-select: none;
    font-size: 1.1rem;
    box-shadow: 0 8px 20px rgba(161,140,209,0.6);
    transition: box-shadow 0.3s ease, transform 0.3s ease, background-color 0.3s ease;
  }

  .actions a.edit {
    background: linear-gradient(135deg, #a18cd1, #fbc2eb);
    color: #42275a;
  }
  .actions a.edit:hover {
    box-shadow: 0 12px 30px rgba(161,140,209,0.9);
    transform: translateY(-3px);
  }

  .actions a.delete {
    background: linear-gradient(135deg, #f093fb, #f5576c);
    color: #5a1a01;
  }
  .actions a.delete:hover {
    box-shadow: 0 12px 30px rgba(240,147,251,0.9);
    transform: translateY(-3px);
  }

  a.add-product {
    display: inline-block;
    margin-bottom: 35px;
    background: linear-gradient(135deg, #a18cd1, #fbc2eb);
    color: #42275a;
    padding: 16px 32px;
    border-radius: 30px;
    font-weight: 700;
    font-size: 1.2rem;
    text-decoration: none;
    box-shadow: 0 8px 20px rgba(161,140,209,0.6);
    transition: box-shadow 0.3s ease, transform 0.3s ease;
    user-select: none;
  }
  a.add-product:hover {
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

  @media (max-width: 600px) {
    .container {
      padding: 30px 20px;
      border-radius: 14px;
      max-width: 100%;
    }
    h1 {
      font-size: 2.2rem;
      margin-bottom: 28px;
    }
    a.add-product {
      padding: 14px 28px;
      font-size: 1.05rem;
    }
    .actions a {
      padding: 10px 20px;
      font-size: 1rem;
    }
    li {
      padding: 16px 18px;
      margin-bottom: 16px;
    }
  }
</style>
</head>
<body>

<div class="container">
  <h1>Danh sách sản phẩm</h1>
  <a href="/bai1/Product/add" class="add-product">+ Thêm sản phẩm mới</a>
  <ul>
    <?php foreach ($products as $product): ?>
      <li>
        <h2><?= htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8') ?></h2>
        <p><?= htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8') ?></p>
        <p class="price">Giá: <?= htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8') ?></p>
        <div class="actions">
          <a href="/bai1/Product/edit/<?= $product->getID() ?>" class="edit">Sửa</a>
          <a href="/bai1/Product/delete/<?= $product->getID() ?>"
             onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');"
             class="delete">Xóa</a>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
  <a href="/" class="back-link">← Trang chủ</a>
</div>

</body>
</html>
