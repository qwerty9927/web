<div class="customer table">
  <div class="header_info">
    <div class="quantity">
      <span></span>
      <p>Số lượng khách hàng</p>
    </div>
    <div class="search_box">
      <input type="text" placeholder="Search..." id="search_box" onkeyup="search_fetch(this.value,'KHACHHANG', 1)">
      <div class="icon_search">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
    </div>
    <button class="btn_add btn" onclick="input_add('KHACHHANG')">
      <i class="fa-solid fa-plus"></i>
      <span>Thêm</span>
    </button>
    <button class="btn_close_edit btn">
      <i class="fa-solid fa-xmark"></i>
      <span>Close Edit</span>
    </button>
  </div>

    <div class="add_data row">
      <div class="add_data_col_1 col">
        <div>
          <label for="">Mã khách hàng</label>
          <input type="text" name="codeCustomer" disabled="true" value="">
        </div>
        <div>
          <label for="">Họ Tên</label>
          <input type="text" name="fullName">
          <div>
            <span></span>
          </div>
        </div>
      </div>
      <div class="add_data_col_2 col">
        <div>
          <label for="">Địa chỉ</label>
          <input type="text" name="address">
          <div>
            <span></span>
          </div>
        </div>
        <div>
          <label for="">SDT</label>
          <input type="text" name="phoneNumber">
          <div>
            <span></span>
          </div>
        </div>
      </div>
      <div class="add_data_col_3 col">
        <button class="btn_action_add btn">Thêm</button>
        <button class="btn_action_edit btn">Sửa</button>
      </div>
    </div>
  <div class="main_info">
    <table>
      <tr>
        <th>Mã khách hàng</th>
        <th>Họ Tên</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
      <tbody class="innerArea">
        
      </tbody>
    </table>
    <div class="page">
      <ul>
        
      </ul>
    </div>
  </div>
</div>
<script src="./assets/js/scriptCustomer.js"></script>
