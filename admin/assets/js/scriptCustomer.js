$(document).ready(function(){
  localStorage.setItem('page', '1')
  submitAdd()
  submitUpdate()
})

function paging_fetch(self){
    let arrFetchForPaging;
    localStorage.setItem('page', self.getAttribute("data"))
    $.ajax({
      method: 'POST',
      url: './connection/ReadData.php',
      data: {
        title: "paging",
        access: "KHACHHANG",
        startPoint: (parseInt(self.getAttribute("data")) - 1) * 10,
      }
    }).done(function(response){
      arrFetchForPaging = JSON.parse(response)
      handleResponse(arrFetchForPaging)
    })
}

function submitAdd(){
  let checkName = 1
  let checkAddress = 1
  let checkPhone = 1
  $('.btn_action_add').click(function (){
    if(!/[a-zA-ZÀ-ý][a-zA-Z0-9-_ ]{4,24}/.test($('.add_data input[name = "fullName"]').val())){
      $('.add_data input[name = "fullName"] + div span').text("Họ tên không thuộc khoảng 4 - 24 hay không lợp lệ")
      checkName = 0
    } else {
      $('.add_data input[name = "fullName"] + div span').text("")
      checkName = 1
    }
    if(!/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/.test($('.add_data input[name = "phoneNumber"]').val())){
      $('.add_data input[name = "phoneNumber"] + div span').text("Số điện thoại không lợp lệ")
      checkPhone = 0
    } else {
      $('.add_data input[name = "phoneNumber"] + div span').text("")
      checkPhone = 1
    }
    if(!/[a-zA-Z][a-zA-Z0-9-_/]{4,24}/.test($('.add_data input[name = "address"]').val())){
      $('.add_data input[name = "address"] + div span').text("Địa chỉ không lợp lệ")
      checkAddress = 0
    } else {
      $('.add_data input[name = "address"] + div span').text("")
      checkAddress = 1
    }
    if(checkName === 1 && checkAddress === 1 && checkPhone === 1){
      $.ajax({
        method: "POST",
        url: './connection/CRUD.php',
        data: {
          title: "create",
          access: "KHACHHANG",
          startPoint: (parseInt(localStorage.getItem('page')) - 1) * 10,
          Makh: $('.add_data input[name = "codeCustomer"]').val(),
          Hoten: $('.add_data input[name = "fullName"]').val(),
          DiaChi: $('.add_data input[name = "address"]').val(),
          SDT: $('.add_data input[name = "phoneNumber"]').val()
        }
      }).done(function (response){
          let result = JSON.parse(response)
          console.log(result)
          if(result){
            let count = String(parseInt($('.quantity span').text()) + 1)
            let pages = Math.ceil(count/10)
            $('.quantity span').text(count)
            let string = ""
            for(let i = 1;i <= pages;i++){
               string += `<li data=${i} onclick="paging_fetch(this)">${i}</li>`
            }
            handleResponse(result)
            $('.page_customer ul').html(string)
            alert("Tạo thành công")
            $('.add_data').fadeOut('slow')
          } else {
            alert("Tạo thất bại")
          }
      })
    }
  })
}

function submitUpdate(){
  let checkName = 1
  let checkAddress = 1
  let checkPhone = 1
  $('.btn_action_edit').click(function (){
    if(!/[a-zA-ZÀ-ý][a-zA-Z0-9-_ ]{4,24}/.test($('.add_data input[name = "fullName"]').val())){
      $('.add_data input[name = "fullName"] + div span').text("Họ tên không thuộc khoảng 4 - 24 hay không lợp lệ")
      checkName = 0
    } else {
      $('.add_data input[name = "fullName"] + div span').text("")
      checkName = 1
    }
    if(!/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/.test($('.add_data input[name = "phoneNumber"]').val())){
      $('.add_data input[name = "phoneNumber"] + div span').text("Số điện thoại không lợp lệ")
      checkPhone = 0
    } else {
      $('.add_data input[name = "phoneNumber"] + div span').text("")
      checkPhone = 1
    }
    if(!/[a-zA-Z][a-zA-Z0-9-_/]{4,24}/.test($('.add_data input[name = "address"]').val())){
      $('.add_data input[name = "address"] + div span').text("Địa chỉ không lợp lệ")
      checkAddress = 0
    } else {
      $('.add_data input[name = "address"] + div span').text("")
      checkAddress = 1
    }
    if(checkName === 1 && checkAddress === 1 && checkPhone === 1 ){
      $.ajax({
        method: "POST",
        url: './connection/CRUD.php',
        data: {
          title: "update",
          access: "KHACHHANG",
          startPoint: (parseInt(localStorage.getItem('page')) - 1) * 10,
          Makh: $('.add_data input[name = "codeCustomer"]').val(),
          Hoten: $('.add_data input[name = "fullName"]').val(),
          DiaChi: $('.add_data input[name = "address"]').val(),
          SDT: $('.add_data input[name = "phoneNumber"]').val()
        }
      }).done(function (response){
          let result = JSON.parse(response)
          console.log(result)
          if(result){
            let count = String(parseInt($('.quantity span').text()) + 1)
            let pages = Math.ceil(count/10)
            $('.quantity span').text(count)
            let string = ""
            for(let i = 1;i <= pages;i++){
              string += `<li data=${i} onclick="paging_fetch(this)">${i}</li>`
            }
            handleResponse(result)
            $('.page_customer ul').html(string)
            alert("Sửa thành công")
            $('.add_data').fadeOut('slow')
            $('.btn_add').css('display', 'block')
            $('.btn_close_edit').css('display', 'none')
          } else {
            alert("Sửa thất bại")
          }
      })
    }
  })
}

function deleteData(access){
  if(confirm("Bạn có muốn xóa!")){
    $.ajax({
      method: "POST",
      url: './connection/CRUD.php',
      data: {
        title: "delete",
        access: "KHACHHANG",
        startPoint: (parseInt(localStorage.getItem('page')) - 1) * 10,
        Makh: access.getAttribute('data')
      }
    }).done(function (response){
      let result = JSON.parse(response)
      console.log(result)
      if(result){
        let count = String(parseInt($('.quantity span').text()) - 1)
        let pages = Math.ceil(count/10)
        $('.quantity span').text(count)
        let string = ""
        for(let i = 1;i <= pages;i++){
          string += `<li data=${i} onclick="paging_fetch(this)">${i}</li>`
        }
        handleResponse(result)
        $('.page_customer ul').html(string)
        alert("Xóa thành công")
      } else {
        alert("Xóa thất bại vì là tham chiếu khóa ngoại")
      }
    })
  }
}

function handleResponse(arr){
  let string = arr.map( item => {
    return `
      <tr>
        <td>${item.Makh}</td>
        <td id='name'>${item.Ten}</td>
        <td>${item.DiaChi}</td>
        <td>${item.SDT}</td>
        <td class='btn_edit' data=${item.Makh} onclick="input_edit(this)">
          <i class="fa-solid fa-pen-to-square"></i>
        </td>
        <td class='btn_delete' data=${item.Makh} onclick="deleteData(this)">
          <i class="fa-solid fa-trash-can"></i>
        </td>
      </tr>
    `
  })
  $('.innerArea').html(string)
}
