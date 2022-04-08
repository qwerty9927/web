<div class="app">
    <div class="header">
      <div class="header_fixed">
        <div class="title">
          <p>Apple</p>
        </div>
        <div class="option">
          <p>Home</p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="left_content">
        <div class="left_content_fixed">
          <div class="user items">
            <ul>
              <a href="./">
                <li class="btn_home">
                  <i class="fa-solid fa-house"></i>
                  <p>Home</p>
                </li>
              </a>
              <li class="admin">
                <div class="circle">
                  <img src="./assets/img/person_48px.png" alt="">
                </div>
                <p><?php echo $_SESSION['TENTK'] ?></p>
              </li>
            </ul>
          </div>
          <div class="menu items">
            <ul>
              <?php
                // session_start();
                require('./connection/connect.php');
                $stringUrl = array("./?option=quan-ly-khach-hang", "./?option=quan-ly-nhan-vien", "./?option=quan-ly-san-pham",
                  "./?option=quan-ly-don-hang", "./?option=quan-ly-hoa-don", "./?option=quan-ly-doanh-thu", "./?option=quan-ly-account",

                );
                $stringIcon = array("fa-solid fa-users-line", "ion ion-person", "fa-solid fa-boxes-stacked", "ion ion-bag",
                  "ion-document-text", "ion ion-stats-bars", "ion-card"
                );
                $conn = connect("cuahang");
                $sql = "SELECT DM.MADM, DM.TENDM FROM q_dm as QDM, danhmuc as DM WHERE QDM.MAQUYEN = '{$_SESSION['MAQUYEN']}' AND DM.MADM = QDM.MADM";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                  echo "
                    <a href={$stringUrl[intval($row['MADM']) - 1]}>
                      <li>
                        <i class='{$stringIcon[intval($row['MADM']) - 1]}'></i>
                        <p>{$row['TENDM']}</p>
                      </li>
                    </a>
                  ";
                }
                close_connect($conn);
              ?>
            </ul>
          </div>
          <ul class="logOut">
            <a href="./?option=logout">
              <li style="color: #fff">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <p>LogOut</p>
              </li>
            </a>
          </ul>
        </div>
      </div>
      <div class="right_content">
        <?php
          if(isset($_GET['option'])){
            switch($_GET['option']){
              case "quan-ly-khach-hang":
                require('./template/customer.php');
                break;
              case "quan-ly-nhan-vien":
                require('./template/staff.php');
                break;
              case "quan-ly-san-pham":
                echo "quan ly san pham";
                break;
              case "quan-ly-don-hang":
                echo "quan ly don hang";
                break;
              case "quan-ly-hoa-don":
                echo "quan ly hoa don";
                break;
              case "quan-ly-doanh-thu":
                echo "quan ly doanh thu";
                break;
              case "quan-ly-account":
                echo "quan ly account";
                break;
              case "logout":
                session_start();
                echo "<script>
                  alert('Logout')
                  window.location.href = 'http://localhost/website/admin/'
                </script>";
                unset($_SESSION['username']);
                // header("location: ./");
                break;
              default:
                echo "404";
            }
          } else {
            require('homePage.php');
          }
        ?>
      </div>
    </div>
  </div>
  <script src="./assets/js/scriptLayout.js"></script>