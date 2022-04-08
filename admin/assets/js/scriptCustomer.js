let arrFetchForPaging;
let arrFetchForSearching;
$(document).ready(function(){
  $('#customer_search').keyup(function (){
    if(this.value !== ""){
      $('.page_customer').css("display", "none")
      $('.main_info').css("height", "auto")
    } else {
      $('.page_customer').css("display", "block")
      $('.main_info').css("height", "500px")
    }
    $.ajax({
      method: "POST", 
      url: './connection/callData.php',
      data: {
        title: "search",
        access: "KHACHHANG",
        searchParameter: this.value
      }
    }).done(function (response){
      arrFetchForSearching = JSON.parse(response)
      console.log(arrFetchForSearching)
      let string = arrFetchForSearching.map( item => {
        return `
          <tr>
            <td>${item.Makh}</td>
            <td id='name'>${item.Ten}</td>
            <td>${item.DiaChi}</td>
            <td>${item.SDT}</td>
             <td>
              <div class='btn_edit'>
                <i class="fa-solid fa-pen-to-square"></i>
              </div>
            </td>
            <td>
              <div class='btn_delete'>
                <i class="fa-solid fa-trash-can"></i>
              </div>
            </td>
          </tr>
        `
      })
      $('.innerArea_customer').html(string)
    })
  })
  $(".page_customer ul li").click(function (){
    console.log(this.getAttribute("data"))
    $.ajax({
      method: 'POST',
      url: './connection/callData.php',
      data: {
        title: "paging",
        access: 'KHACHHANG',
        startPoint: (parseInt(this.getAttribute("data")) - 1) * 10,
        endPoint: 10
      }
    }).done(function(response){
      arrFetchForPaging = JSON.parse(response)
      let string = arrFetchForPaging.map(item => {
        return `
            <tr>
              <td>${item.Makh}</td>
              <td id='name'>${item.Ten}</td>
              <td>${item.DiaChi}</td>
              <td>${item.SDT}</td>
              <td>
                <div class='btn_edit'>
                  <i class="fa-solid fa-pen-to-square"></i>
                </div>
              </td>
              <td>
                <div class='btn_delete'>
                  <i class="fa-solid fa-trash-can"></i>
                </div>
              </td>
            </tr>
        `
      })
      $('.innerArea_customer').html(string)
    })
  })
})
