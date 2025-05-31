<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý sản phẩm</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Navbar style */
    .navbar {
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      border-bottom-left-radius: 12px;
      border-bottom-right-radius: 12px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
      padding: 15px 30px;
    }

    .navbar-brand {
      color: #ffffff !important;
      font-weight: bold;
      font-size: 1.5rem;
      transition: transform 0.3s ease, color 0.3s ease;
    }

    .navbar-brand:hover {
      color: #00e5ff !important;
      transform: scale(1.05);
    }

    .navbar-nav .nav-link {
      color: #d0f0ff !important;
      font-weight: 500;
      margin-right: 20px;
      position: relative;
      transition: color 0.3s ease;
    }

    .navbar-nav .nav-link::after {
      content: "";
      position: absolute;
      width: 0;
      height: 2px;
      left: 0;
      bottom: -5px;
      background: #00e5ff;
      transition: width 0.3s ease;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus {
      color: #00e5ff !important;
    }

    .navbar-nav .nav-link:hover::after,
    .navbar-nav .nav-link:focus::after {
      width: 100%;
    }

    .navbar-toggler {
      border-color: rgba(255, 255, 255, 0.4);
    }

    .navbar-toggler-icon {
      filter: invert(100%);
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Quản lý sản phẩm</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
      data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/webbanhang/Product/">Danh sách sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/webbanhang/Product/add">Thêm sản phẩm</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-4">
    <!-- Nội dung trang -->
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
