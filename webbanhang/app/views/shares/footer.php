<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Footer test</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<style>
footer {
  background: linear-gradient(135deg, #1e3c72, #2a5298);
  color: #f0f4f8;
  padding-top: 20px;
  padding-bottom: 20px;
}
footer .container {
  max-width: 1200px;
  margin: 0 auto;
}
footer h5 {
  color: #a8dadc;
  margin-bottom: 15px;
  font-weight: 700;
}
footer p, 
footer ul li a {
  color: #e0f7fa;
  text-decoration: none;
}
footer ul li a:hover {
  color: #00bcd4;
  text-decoration: underline;
}
footer .text-center.p-3 {
  background: linear-gradient(135deg, #0a1a36, #134d7a);
  color: #a8dadc;
}
footer a.text-dark {
  margin-right: 15px;
  font-size: 1.3rem;
  transition: color 0.3s ease;
}
/* Màu icon mạng xã hội */
footer a.text-dark.me-3 .fa-facebook-f {
  color: #1877F2;
}
footer a.text-dark.me-3 .fa-twitter {
  color: #1DA1F2;
}
footer a.text-dark.me-3 .fa-instagram {
  color: #E4405F;
}
footer a.text-dark:hover {
  color: #00bcd4;
}
footer .fab {
  vertical-align: middle;
}
</style>
</head>
<body>
<footer class="bg-light text-center text-lg-start mt-4">
  <div class="container p-4">
    <div class="row">
      <div class="col-lg-6 col-md-12 mb-4">
        <h5 class="text-uppercase">Quản lý sản phẩm</h5>
        <p>
          Hệ thống quản lý sản phẩm giúp bạn theo dõi và cập nhật thông tin
          sản phẩm dễ dàng.
        </p>
      </div>
    
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="text-uppercase">Kết nối với chúng tôi</h5>
        <a href="#" class="text-dark me-3"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-dark me-3"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-dark me-3"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>
  <div class="text-center p-3 bg-dark text-white">
    © 2025 Quản lý sản phẩm. All rights reserved.
  </div>
</footer>
</body>
</html>
