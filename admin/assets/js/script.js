function search_fetch(self, subject){ // Đã tối ưu
  let arrFetchForSearching;
  if(self.value !== ""){
    $('.page').css("display", "none")
    $('.main_info').css("height", "auto")
  } else {
    $('.page').css("display", "block")
    $('.main_info').css("height", "500px")
  }
  $.ajax({
    method: "POST", 
    url: './connection/ReadData.php',
    data: {
      title: "search",
      access: subject,
      searchParameter: self.value
    }
  }).done(function (response){
    arrFetchForSearching = JSON.parse(response)
    handleResponse(arrFetchForSearching)
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
      access: subject
    }
  }).done(function (response){
    $('.add_data input[name = "codeCustomer"]').val(response)
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