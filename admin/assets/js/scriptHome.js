function timer() {
  const hour = document.querySelector('#id_hour')
  const minute = document.querySelector('#id_minute')
  const second = document.querySelector('#id_second')
  const day = document.querySelector('#id_day')
  const month = document.querySelector('#id_month')
  const year = document.querySelector('#id_year')
  let interval = setInterval(() => {
    const date = new Date()    
    let varHours = date.getHours()
    let varMinutes = date.getMinutes()
    let varSeconds = date.getSeconds()
    let varDate = date.getDate()
    let varMonth = date.getMonth()
    let varYear = date.getFullYear()
    
    hour.innerText = varHours
    if(varMinutes < 10){
      minute.innerText = `0${varMinutes}`
    } else {
      minute.innerText = varMinutes
    }
    if(varSeconds < 10){
      second.innerText = `0${varSeconds}`
    } else {
      second.innerText = varSeconds
    }
    
    if(varDate < 10){
      day.innerText = `0${varDate}`
    } else {
      day.innerText = varDay
    }
    month.innerText = varMonth + 1
    year.innerText = varYear
  }, 100)
  return interval
}

if(window.location.pathname == "/website/admin/"){
  timer()
}