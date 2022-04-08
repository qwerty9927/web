<div class="login_page">
  <div class="login form">
    <h2 class="title_form">Login</h2>
    <form action="./connection/handle.php" method="POST" onsubmit="return checkLogin()">
      <div class="username_log">
        <div class="input">
          <i class="fa-solid fa-user"></i>
          <input type="text" placeholder="Username" name="Username">
        </div>
        <span></span>
      </div>
      <div class="password_log">
        <div class="input">
          <i class="fa-solid fa-lock"></i>
          <input type="password" placeholder="Password" name="Password">
        </div>
        <span></span>
      </div>
      <div class="checkBox">
        <input type="checkbox" name="check[]">
        <p style="color: #fff">Remember me</p>
      </div>
      <div class="btn_submit">
        <input type="submit" value="Sign In" name="submit">
      </div>
      <!-- <div class="link">
        <span style="opacity: .5; margin-right: 10px; color: #fff">Not a member?</span>
        <a href="./?request=resgister">Sign Up now</a>
      </div> -->
    </form>
  </div>
</div>
<script src = "./assets/js/scriptLogin.js"></script>
