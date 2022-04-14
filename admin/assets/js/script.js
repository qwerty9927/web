function search_fetch(value, subject, page){
  $.ajax({
    method: "POST", 
    url: './connection/ReadData.php',
    data: {
      title: "search",
      access: subject,
      startPoint: (page - 1) * 10,
      searchParameter: value
    }
  }).done(function (response){
    let result = JSON.parse(response)
    $('.quantity span').text(result.count)
    let pages = Math.ceil(result.count/10)
    let string = ""
    for(let i = 1;i <= pages;i++){
        string += `<li data=${i} onclick="search_fetch('${value}', '${subject}', ${i})">${i}</li>` // phân trang 
    }
    $('.page ul').html(string)
    handleResponse(result.value)
  })
}

function input_add(subject){
  $('.add_data').fadeToggle('slow')
  $('.add_data').css('display', 'flex')
  $('.btn_action_add').css('display', 'block')
  $('.btn_action_edit').css('display', 'none')
  $('.add_data input:not(input[name = "codeCustomer"])').val("")
  $.ajax({
    method: "POST",
    url: './connection/ReadData.php',
    data: {
      title: "nextCode",
      access: subject,
      field: "Makh"
    }
  }).done(function (response){
    let result = JSON.parse(response)
    $('.add_data input[name = "codeCustomer"]').val(result)
  })
}

function input_edit(access){
  let _this = access
  $('.add_data').fadeIn("slow")
  $('.add_data').css('display', 'flex')
  $('.btn_add').css('display', 'none')
  $('.btn_action_edit').css('display', 'block')
  $('.btn_action_add').css('display', 'none')
  $('.btn_close_edit').css('display', 'block')
  $('.btn_close_edit').click(function (){
    $('.add_data').fadeOut("slow")
    $('.btn_close_edit').css('display', 'none')
    $('.btn_add').css('display', 'block')
  })
  
  $('.add_data input').each( function(index) {
    $(this).val($(_this).closest('tr').children('td')[index].textContent)
  })
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


