<?php include 'app/views/shares/header.php'; ?>
<style>
  /* NỀN GRADIENT ĐỘNG CHUYỂN MÀU NHIỀU TONE */
  .gradient-custom {
    position: relative;
    z-index: 1;
    background: linear-gradient(270deg, #4b6cb7, #182848, #4b6cb7, #00d2ff, #3a6186);
    background-size: 1200% 1200%;
    animation: GradientShift 20s ease infinite;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  @keyframes GradientShift {
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
  }

  /* HẠT PARTICLES NỔI LÊN MỀM MẠI */
  #particles-js {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 0;
    pointer-events: none;
  }

  /* LỤC GIÁC 3D HIỆN ĐẠI */
  #hexBackground {
    position: absolute;
    top: 50%; left: 50%;
    width: 120%;
    height: 120%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-content: center;
    gap: 10px 4px;
    transform: translate(-50%, -50%) rotateX(15deg) rotateZ(15deg);
    perspective: 1000px;
    z-index: 1;
    filter: drop-shadow(0 0 6px rgba(0, 120, 255, 0.6));
    opacity: 0.16;
  }

  .hexagon {
    width: 64px;
    height: 74px;
    background: linear-gradient(145deg, #1f3b8d, #0e1a40);
    clip-path: polygon(
      25% 0%, 75% 0%, 
      100% 50%, 75% 100%, 
      25% 100%, 0% 50%
    );
    box-shadow:
      inset 0 2px 4px rgba(255, 255, 255, 0.15),
      0 0 12px rgba(0, 180, 255, 0.4);
    animation: hexGlow 8s ease-in-out infinite;
    transform-origin: center;
    transition: box-shadow 0.3s ease;
  }

  @keyframes hexGlow {
    0%, 100% {
      filter: drop-shadow(0 0 6px rgba(0, 180, 255, 0.6));
      background: linear-gradient(145deg, #1f3b8d, #0e1a40);
      transform: scale(1) rotate(0deg);
    }
    50% {
      filter: drop-shadow(0 0 18px rgba(0, 240, 255, 1));
      background: linear-gradient(145deg, #00d2ff, #1f3b8d);
      transform: scale(1.1) rotate(3deg);
    }
  }

  /* Delay animation không đồng bộ */
  .hexagon:nth-child(3n) { animation-delay: 0s; }
  .hexagon:nth-child(3n+1) { animation-delay: 2.7s; }
  .hexagon:nth-child(3n+2) { animation-delay: 5.4s; }

  /* FORM ĐĂNG NHẬP GLASSMORPHISM */
  .card {
    position: relative;
    z-index: 10;
    background: rgba(255 255 255 / 0.12);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 1rem;
    border: 1px solid rgba(255 255 255 / 0.18);
    color: #e0e6f0;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .card:hover {
    transform: translateY(-12px);
    box-shadow: 0 12px 40px 0 rgba(0, 200, 255, 0.7);
  }

  .card-body {
    opacity: 0;
    animation: fadeInUp 1s forwards;
    animation-delay: 0.3s;
  }

  @keyframes fadeInUp {
    from {opacity: 0; transform: translateY(30px);}
    to {opacity: 1; transform: translateY(0);}
  }

  /* INPUT FORM TINH TẾ */
  .form-control {
    background: rgba(255 255 255 / 0.18);
    border: none;
    border-radius: 0.6rem;
    color: #d6e4ff;
    padding: 14px 20px;
    font-size: 1.1rem;
    transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
    box-shadow: inset 0 0 5px rgba(255 255 255 / 0.15);
  }
  .form-control::placeholder {
    color: #a3b1ff;
  }
  .form-control:focus {
    background: rgba(255 255 255 / 0.38);
    box-shadow: 0 0 20px 3px #00d2ff;
    outline: none;
    transform: scale(1.05);
    color: white;
  }

  label.form-label {
    font-weight: 600;
    font-size: 1rem;
    color: #b0c7ff;
  }

  /* Nút đăng nhập */
  button.btn-outline-light {
    border-radius: 50px;
    padding: 14px 60px;
    font-weight: 700;
    letter-spacing: 1.7px;
    font-size: 1.3rem;
    color: #00d2ff;
    border: 2px solid #00d2ff;
    background: transparent;
    transition: background-color 0.4s ease, color 0.4s ease, transform 0.2s ease, box-shadow 0.3s ease;
  }
  button.btn-outline-light:hover {
    background-color: #00d2ff;
    color: #182848;
    box-shadow: 0 0 20px #00d2ff;
    transform: scale(1.15);
  }

  /* Icon mạng xã hội */
  .fab {
    font-size: 1.8rem;
    margin: 0 14px;
    transition: color 0.4s ease, transform 0.4s ease;
    cursor: pointer;
    animation: pulse 2.5s infinite;
  }
  .fab:hover {
    color: #00d2ff;
    transform: scale(1.3);
    animation: none;
  }

  @keyframes pulse {
    0% { transform: scale(1); opacity: 0.7; }
    50% { transform: scale(1.15); opacity: 1; }
    100% { transform: scale(1); opacity: 0.7; }
  }

  a.text-white-50 {
    color: #a3b1ff;
    transition: color 0.3s ease;
  }
  a.text-white-50:hover {
    color: #00d2ff;
    text-decoration: underline;
  }
</style>

<!-- PHẦN HIỂN THỊ -->
<div id="particles-js"></div>
<div id="hexBackground" aria-hidden="true">
  <?php for ($i = 0; $i < 60; $i++): ?>
    <div class="hexagon"></div>
  <?php endfor; ?>
</div>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white">
          <div class="card-body p-5 text-center">
            <form action="/webbanhang/account/checklogin" method="post" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off">
              <div class="mb-md-5 mt-md-4 pb-5">
                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                <div class="form-outline form-white mb-4">
                  <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required />
                  <label class="form-label" for="username">Username</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
                  <label class="form-label" for="password">Password</label>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                  <a href="#!" class="text-white"><i class="fab fa-facebook-f"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-twitter mx-4 px-2"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-google"></i></a>
                </div>
              </div>

              <div>
                <p class="mb-0">Don't have an account? 
                  <a href="/webbanhang/account/register" class="text-white-50 fw-bold">Sign Up</a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Thêm thư viện particles.js -->
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
  /* Cấu hình particles cho hiệu ứng hạt nổi nhẹ */
  particlesJS("particles-js", {
    "particles": {
      "number": {
        "value": 70,
        "density": { "enable": true, "value_area": 800 }
      },
      "color": { "value": "#00d2ff" },
      "shape": {
        "type": "circle",
        "stroke": { "width": 0, "color": "#000000" }
      },
      "opacity": {
        "value": 0.18,
        "random": true,
        "anim": { "enable": true, "speed": 0.3, "opacity_min": 0.05, "sync": false }
      },
      "size": {
        "value": 3,
        "random": true,
        "anim": { "enable": false }
      },
      "move": {
        "enable": true,
        "speed": 0.4,
        "direction": "top",
        "random": true,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": { "enable": false }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": { "enable": false },
        "onclick": { "enable": false },
        "resize": true
      }
    },
    "retina_detect": true
  });
</script>

<?php include 'app/views/shares/footer.php'; ?>
