<?php
  $conn = connect("cuahang");
  $sqlCount = "SELECT COUNT(*) as count FROM KHACHHANG";
  $resultCounter = mysqli_query($conn, $sqlCount);
  $temp = mysqli_fetch_array($resultCounter, MYSQLI_ASSOC)['count'];
  $count = ceil(intval($temp)/10);
?>
<div class="customer table">
  <div class="header_info">
    <div class="quantity">
      <span><?php echo $temp ?></span>
      <p>Số lượng khách hàng</p>
    </div>
    <div class="search_box">
      <input type="text" placeholder="Search..." id="customer_search">
      <div class="icon_search">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
    </div>
    <a href="./?option=quan-ly-khach-hang&action=add">
      <div class="btn_add">
        <i class="fa-solid fa-house"></i>
        <span>Thêm</span>
      </div>
    </a>
  </div>
  <div class="main_info">
    <table>
      <tr>
        <th>Mã khách hàng</th>
        <th>Họ Tên</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
      </tr>
      <tbody class="innerArea_customer">
        <?php
          $sql = "SELECT * FROM KHACHHANG LIMIT 0, 10";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo "
              <tr>
                <td>{$row['Makh']}</td>
                <td id='name'>{$row['Ten']}</td>
                <td>{$row['DiaChi']}</td>
                <td>{$row['SDT']}</td>
              </tr>
            ";
          }
        ?>
      </tbody>
    </table>
    <div class="page_customer page">
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
<script src="./assets/js/scriptCustomer.js"></script>
