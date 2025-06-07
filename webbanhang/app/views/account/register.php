<?php include 'app/views/shares/header.php'; ?>

<style>
  /* NỀN GRADIENT ĐỘNG */
  body, html {
    height: 100%;
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  .gradient-custom {
    position: relative;
    min-height: 100vh;
    background: linear-gradient(270deg, #4b6cb7, #182848, #4b6cb7, #00d2ff, #3a6186);
    background-size: 1200% 1200%;
    animation: GradientShift 20s ease infinite;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 0;
  }
  @keyframes GradientShift {
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
  }

  /* CARD GLASSMORPHISM */
  .card-register {
    background: rgba(255 255 255 / 0.12);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 1rem;
    border: 1px solid rgba(255 255 255 / 0.18);
    color: #e0e6f0;
    max-width: 600px;
    width: 90%;
    padding: 30px 40px;
  }

  /* FORM CONTROL */
  .form-control-user {
    background: rgba(255 255 255 / 0.18);
    border: none;
    border-radius: 0.6rem;
    color: #d6e4ff;
    padding: 14px 20px;
    font-size: 1.1rem;
    margin-bottom: 20px;
    box-shadow: inset 0 0 5px rgba(255 255 255 / 0.15);
    transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
  }
  .form-control-user::placeholder {
    color: #a3b1ff;
  }
  .form-control-user:focus {
    background: rgba(255 255 255 / 0.38);
    box-shadow: 0 0 20px 3px #00d2ff;
    outline: none;
    transform: scale(1.05);
    color: white;
  }

  /* NÚT REGISTER */
  .btn-primary {
    border-radius: 50px;
    padding: 14px 60px;
    font-weight: 700;
    letter-spacing: 1.7px;
    font-size: 1.3rem;
    background-color: #00d2ff;
    border: none;
    color: #182848;
    box-shadow: 0 0 20px #00d2ff;
    transition: background-color 0.4s ease, color 0.4s ease, transform 0.2s ease, box-shadow 0.3s ease;
    cursor: pointer;
  }
  .btn-primary:hover {
    background-color: #3a6186;
    color: #a3b1ff;
    box-shadow: 0 0 30px #3a6186;
    transform: scale(1.1);
  }

  /* LỖI */
  ul {
    list-style-type: none;
    padding-left: 0;
    margin-bottom: 20px;
  }
  ul li.text-danger {
    background: rgba(255, 0, 0, 0.2);
    color: #ff4d4d;
    padding: 10px 15px;
    border-radius: 0.5rem;
    margin-bottom: 10px;
    font-weight: 600;
  }

  /* ROW FLEX */
  .form-group.row {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
  }
  .col-sm-6 {
    flex: 1 1 calc(50% - 10px);
  }
  @media(max-width: 480px) {
    .col-sm-6 {
      flex: 1 1 100%;
    }
  }
</style>

<section class="gradient-custom">
  <div class="card-register">
    <?php
      if (isset($errors) && is_array($errors) && count($errors) > 0) {
        echo "<ul>";
        foreach ($errors as $err) {
          echo "<li class='text-danger'>$err</li>";
        }
        echo "</ul>";
      }
    ?>
    <form class="user" action="/webbanhang/account/save" method="post" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off">
      <div class="form-group row">
        <div class="col-sm-6">
          <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="col-sm-6">
          <input type="text" class="form-control form-control-user" id="fullname" name="fullname" placeholder="Full name" required>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6">
          <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="col-sm-6">
          <input type="password" class="form-control form-control-user" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required>
        </div>
      </div>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-primary btn-icon-split p-3">Register</button>
      </div>
    </form>
  </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>
