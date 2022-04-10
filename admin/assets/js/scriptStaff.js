let arrFetchForPaging;
let arrFetchForSearching;
$(document).ready(function(){
  $('#staff_search').keyup(function (){
    if(this.value !== ""){
      document.querySelector('.page_staff').style.display = "none"
      document.querySelector('.main_info').style.height = "auto"
    } else {
      document.querySelector('.page_staff').style.display = "block"
      document.querySelector('.main_info').style.height = "470px"
    }
    $.ajax({
      method: "POST", 
      url: './connection/ReadData.php',
      data: {
        title: "search",
        access: "NHANVIEN",
        searchParameter: this.value
      }
    }).done(function (response){
      arrFetchForSearching = JSON.parse(response)
      let string = arrFetchForSearching.map( item => {
        return `
          <tr>
            <td>${item.Manv}</td>
            <td id='name'>${item.Ten}</td>
            <td>${item.DiaChi}</td>
            <td>${item.SDT}</td>
            <td>${item.NgayVaoLam}</td>
            <td>${item.NgaySinh}</td>
          </tr>
        `
      })
      $('.innerArea_staff').html(string)
    })
  })
  $(".page_staff ul li").click(function(){
    console.log(this.getAttribute("data"))
    $.ajax({
      method: 'POST',
      url: './connection/ReadData.php',
      data: {
        title: "paging",
        access: 'NHANVIEN',
        startPoint: (parseInt(this.getAttribute("data")) - 1) * 10,
        endPoint: 10
      }
    }).done(function(response){
      arrFetchForPaging = JSON.parse(response)
      let string = arrFetchForPaging.map(item => {
        return `
            <tr>
              <td>${item.Manv}</td>
              <td id='name'>${item.Ten}</td>
              <td>${item.DiaChi}</td>
              <td>${item.SDT}</td>
              <td>${item.NgayVaoLam}</td>
              <td>${item.NgaySinh}</td>
            </tr>
        `
      })
      $('.innerArea_staff').html(string);
    })
  })
})
