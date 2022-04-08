<?php
  $conn = connect("cuahang");
  $sql = "SELECT * FROM NHANVIEN as NV WHERE NV.MATK = {$_SESSION['MATK']}";
  $result = mysqli_query($conn, $sql);
  $info = mysqli_fetch_assoc($result);
  close_connect($conn);
?>
<div class="home_page">
  <div class="top_home_page">
    <div class="clock">
      <div class="time">
        <span id="id_hour"></span>
        <span>:</span>
        <span id="id_minute"></span>
        <span>:</span>
        <span id="id_second"></span>
      </div>
      <div class="date">
        <span id="id_day">day</span>
        <span>/</span>
        <span id="id_month">month</span>
        <span>/</span>
        <span id="id_year">year</span>
      </div>
    </div>
    <div class="info">
      <img src="./assets/img/person_48px.png" alt="">
      <div class="person_info">
        <div class="private_info">
          <div class="full_name">
            <span>Họ Tên: </span>
            <span><?php echo $info['Ten'] ?></span>
          </div>
          <div class="birthday">
            <span>Ngay Sinh: </span>
            <span><?php echo $info['NgaySinh'] ?></span>
          </div>
          <div class="address">
            <span>Địa chỉ: </span>
            <span><?php echo $info['DiaChi'] ?></span>
          </div>
        </div>
        <div class="general_info">
          <div class="code">
            <span>MANV: </span>
            <span><?php echo $info['Manv'] ?></span>
          </div>
          <!-- <div class="position">
            <span>Chức vụ: </span>
            <span>Nhân viên</span>
          </div> -->
        </div>
      </div>
    </div>    
  </div>
  <div class="bottom_home_page">
    <div class="products box">
      <div class="inner">
        <span>0</span>
        <p>Sản phẩm</p>
      </div>
      <div class="icon">
        <i class="fa-solid fa-boxes-stacked"></i>
        <a href="javascript:void(0)">
          <span>Thông tin chi tiết</span>
          <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="order box">
      <div class="inner">
        <span>0</span>
        <p>Đơn hàng</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
        <a href="javascript:void(0)">
          <span>Thông tin chi tiết</span>
          <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="consumer box">
      <div class="inner">
        <span>0</span>
        <p>Khách hàng</p>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
        <a href="javascript:void(0)">
          <span>Thông tin chi tiết</span>
          <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="revenue box">
      <div class="inner">
        <span>0</span>
        <p>Hóa đơn</p>
      </div>
      <div class="icon">
        <i class="ion-document-text"></i>
        <a href="javascript:void(0)">
          <span>Thông tin chi tiết</span>
          <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  </div>
</div>
<script src="./assets/js/scriptHome.js"></script>