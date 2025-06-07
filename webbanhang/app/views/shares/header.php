<!-- Header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Web Bán Hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap + Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Custom Global Styles -->
    <style>
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        scroll-behavior: smooth;
        background-color: #121212;
        color: #e0e0e0;
        margin: 0;
        padding: 0;
      }

      /* Navbar */
      .navbar {
        background: linear-gradient(90deg, #1e1e2f, #27293d);
        box-shadow: 0 6px 20px rgba(33, 161, 241, 0.3);
        padding: 0.7rem 1.5rem;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        transition: background 0.3s ease;
      }
      .navbar:hover {
        background: linear-gradient(90deg, #26304a, #354467);
        box-shadow: 0 8px 30px rgba(33, 161, 241, 0.6);
      }

      .navbar-brand {
        font-weight: 700;
        font-size: 1.4rem;
        color: #61dafb;
        user-select: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }
      .navbar-brand:hover {
        color: #21a1f1;
        text-decoration: none;
      }

      /* Navbar icon */
      .navbar-brand i {
        font-size: 1.7rem;
        color: #61dafb;
      }

      /* Menu items */
      .nav-link {
        color: #cfd8dc;
        font-weight: 500;
        font-size: 1rem;
        transition: color 0.3s ease, transform 0.2s ease;
        user-select: none;
      }
      .nav-link:hover,
      .nav-link:focus {
        color: #61dafb !important;
        text-decoration: underline;
        transform: scale(1.05);
      }

      /* Active link style */
      .nav-link.active {
        color: #21a1f1 !important;
        font-weight: 700;
        position: relative;
      }
      .nav-link.active::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, #00c6ff, #0072ff);
        bottom: 0;
        left: 0;
        border-radius: 2px;
      }

      /* Auth buttons */
      .nav-link.btn-auth {
        background: linear-gradient(45deg, #00c6ff, #0072ff);
        border-radius: 20px;
        padding: 5px 15px;
        color: white !important;
        font-weight: 600;
        transition: background 0.3s ease;
        user-select: none;
      }
      .nav-link.btn-auth:hover {
        background: linear-gradient(45deg, #0072ff, #00c6ff);
        color: white !important;
        text-decoration: none;
      }

      /* Dropdown menu */
      .dropdown-menu-dark {
        background-color: #2c2f48;
        border-radius: 10px;
        border: none;
        box-shadow: 0 5px 15px rgba(33, 161, 241, 0.3);
      }
      .dropdown-item {
        color: #cfd8dc;
        transition: background-color 0.2s ease, color 0.2s ease;
      }
      .dropdown-item:hover, .dropdown-item:focus {
        background-color: #0072ff;
        color: white;
      }

      /* Cart badge */
      .cart-icon {
        position: relative;
        font-size: 1.3rem;
        color: #61dafb;
        transition: color 0.3s ease;
      }
      .cart-icon:hover {
        color: #21a1f1;
      }
      .cart-badge {
        position: absolute;
        top: -6px;
        right: -10px;
        background: #ff3b3b;
        color: white;
        font-size: 0.7rem;
        font-weight: 700;
        padding: 2px 6px;
        border-radius: 50%;
        box-shadow: 0 0 4px #ff3b3b;
        user-select: none;
      }

      /* Responsive adjustments */
      @media (max-width: 576px) {
        .navbar-nav {
          background-color: #1e1e2f;
          padding: 1rem;
          border-radius: 0.5rem;
          margin-top: 0.5rem;
        }
      }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/webbanhang">
      <i class="fas fa-shopping-bag"></i>
      Web Bán Hàng
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">

        <li class="nav-item">
          <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/webbanhang/Product/' || $_SERVER['REQUEST_URI'] == '/webbanhang/Product/index') echo 'active'; ?>" href="/webbanhang/Product/">Danh sách sản phẩm</a>
        </li>

        <?php if (SessionHelper::isAdmin()): ?>
          <li class="nav-item">
            <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/webbanhang/Product/add') echo 'active'; ?>" href="/webbanhang/Product/add">Thêm sản phẩm</a>
          </li>
        <?php endif; ?>

        <!-- Giỏ hàng -->
        <li class="nav-item ms-3">
          <a class="nav-link position-relative" href="/webbanhang/Product/cart">
            <i class="fas fa-shopping-cart cart-icon"></i>
            <?php
              $cart_count = isset($_SESSION['cart_count']) ? intval($_SESSION['cart_count']) : 0;
              if ($cart_count > 0) {
                echo '<span class="cart-badge">' . $cart_count . '</span>';
              }
            ?>
          </a>
        </li>

        <?php if (SessionHelper::isLoggedIn()): ?>
          <li class="nav-item dropdown ms-3">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <?= htmlspecialchars($_SESSION['username']) ?> (<?= SessionHelper::getRole() ?>)
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="/webbanhang/account/profile">Hồ sơ</a></li>
              <li><a class="dropdown-item" href="/webbanhang/account/logout">Đăng xuất</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item ms-3">
            <a class="nav-link btn-auth" href="/webbanhang/account/login">Đăng nhập</a>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
