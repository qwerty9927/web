<style>  
  body {
    width: 100vw;
    height: 100vh;
    overflow: hidden;
  }
  .app_loader {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .loader {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 16px solid #f3f3f3;
    border-top: 16px solid #3498db;
    animation: spin 2s linear infinite;
  }

  @keyframes spin {
    0%{
      transform: rotate(0);
    }
    100%{
      transform: rotate(360deg);  
    }
  }
</style>
<div class="app_loader">
  <div class="loader">
  
  </div>
    <?php 
      if(isset($_POST['submit'])){
        session_start();
        require_once('connect.php');
        $conn = connect("cuahang");
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $queryAccount = "SELECT * FROM TAIKHOAN WHERE Username = '$username' AND Password = '$password' AND MAQUYEN != 'KH'";
        $accountInfo = mysqli_query($conn, $queryAccount);
        $row = mysqli_fetch_assoc($accountInfo);
        $num_row = mysqli_num_rows($accountInfo);
        if($num_row){
          $_SESSION['username'] = $username;
          $matk = $row['MATK']; // lấy mã tài khoản
          $maq = $row['MAQUYEN']; // lấy mã quyền
          $urlHinh = $row['urlHinh']; // lấy link ảnh
          $name = $row['TENTK']; // lấy tên tài khoản
          $_SESSION['MATK'] = $matk;
          $_SESSION['MAQUYEN'] = $maq;
          $_SESSION['urlHinh'] = $urlHinh;
          $_SESSION['TENTK'] = $name;
          if(!empty($_POST['check'])){
            setcookie("PHPSESSID", session_id(), time() + (3600 * 24), "/");
              // echo "<br>".$_POST['check'][0]."<br>";
          }
          close_connect($conn);
          // chuyển hướng người dùng
          echo "<script> 
            alert('Login thành công')
            window.history.go(-1)
          </script>";
        } else {
          close_connect($conn);
          // chuyển hướng người dùng
          echo "<script>
            alert('Tài khoản hoặc mật khẩu không đúng')
            window.history.go(-1)
          </script>";
        }
      }
    ?>
</div>
