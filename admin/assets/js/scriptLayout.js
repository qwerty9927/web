const option = document.querySelector('.option')

function handleEvent() {
  const itemsClick = document.querySelectorAll('.left_content_fixed ul li:not(.admin)')
  let keyPress
  console.log(window.location.href)
  if(window.location.href === 'http://localhost/website/admin/'){
    keyPress = 0
  }else {
    keyPress = JSON.parse(localStorage.getItem('keyPress'))
  }
  itemsClick.forEach((element, index) => {
    element.addEventListener('click', (e) => {
      localStorage.setItem('keyPress', 
        JSON.stringify(index)
      )
    })
    if(index === keyPress){
      element.classList.add('active_click')
      option.innerHTML = `<p>${element.childNodes[3].textContent}</p>`
    }
  })
}
handleEvent()