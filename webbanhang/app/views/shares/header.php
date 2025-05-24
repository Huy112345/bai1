<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quản lý sản phẩm</title>
<link
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
rel="stylesheet">
<style>
    /* Gradient nền cho navbar */
    .navbar {
      background: linear-gradient(135deg, #1e3c72, #2a5298);
    }

    /* Logo / brand màu trắng */
    .navbar-brand {
     color: #b2dfdb !important;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    /* Link navbar màu trắng */
    .navbar-nav .nav-link {
      color: #b2dfdb !important;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    /* Hover effect cho link navbar */
    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus {
      color: #00bcd4 !important;
    }

    /* Nút toggle (responsive) màu trắng */
    .navbar-toggler {
      border-color: rgba(255, 255, 255, 0.3);
    }

    .navbar-toggler-icon {
      filter: invert(1);
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">Quản lý sản phẩm</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" datatarget="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle
navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="/webbanhang/Product/">Danh sách sản
phẩm</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/webbanhang/Product/add">Thêm sản
phẩm</a>
</li>
</ul>
</div>
</nav>
<div class="container mt-4">
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script
src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></scrip
t>
<script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>