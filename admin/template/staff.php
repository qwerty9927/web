<?php
  $conn = connect("cuahang");
  $sqlCount = "SELECT COUNT(*) as count FROM NHANVIEN";
  $resultCounter = mysqli_query($conn, $sqlCount);
  $temp = mysqli_fetch_array($resultCounter, MYSQLI_ASSOC)['count'];
  $count = ceil(intval($temp)/10);
?>
<div class="staff table">
  <div class="header_info">
    <div class="quantity">
      <span><?php echo $temp ?></span>
      <p>Số lượng khách hàng</p>
    </div>
    <div class="search_box">
      <input type="text" placeholder="Search..." id="staff_search">
      <div class="icon_search">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
    </div>
  </div>
  <div class="main_info">
    <table>
      <tr>
        <th>Mã nhân viên </th>
        <th>Họ Tên</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Ngày vào làm</th>
        <th>Ngày sinh</th>
      </tr>
      <tbody class="innerArea_staff">
        <?php
          $conn = connect("cuahang");
          $sql = "SELECT * FROM NHANVIEN LIMIT 0, 10";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo "
                  <tr>
                    <td>{$row['Manv']}</td>
                    <td id='name'>{$row['Ten']}</td>
                    <td>{$row['DiaChi']}</td>
                    <td>{$row['SDT']}</td>
                    <td>{$row['NgayVaoLam']}</td>
                    <td>{$row['NgaySinh']}</td>
                  </tr>
                ";
          }
          close_connect($conn);
        ?>
      </tbody>
    </table>
    <div class="page_staff page">
      <ul>
        <?php     
          for($i = 1;$i <= $count;$i++){
            echo "<li data=$i>$i</li>";
          }
        ?>
      </ul>
    </div>
  </div>
</div>
<script src='./assets/js/scriptStaff.js'></script>
