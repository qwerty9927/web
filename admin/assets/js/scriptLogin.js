// function checkResgister(){
//   const username = document.querySelector('input[name = "username"]')
//   const password = document.querySelector('input[name = "password"]')
//   const displayName = document.querySelector('input[name = "displayName"]')
//   const telephone = document.querySelector('input[name = "telephone"]')
//   const wanningUser = document.querySelector('.username_reg span')
//   const wanningPass = document.querySelector('.password_reg span')
//   const wanningName = document.querySelector('.displayName span')
//   const wanningPhone = document.querySelector('.telephone span')
//   if(!/[a-zA-Z][a-zA-Z0-9-_]{4,24}/.test(username.value)){
//     wanningUser.innerText = "Username không hợp lệ"
//     return false
//   } else {
//     wanningUser.innerText = ""
//   }
//   if(!/[a-zA-Z][a-zA-Z0-9-_]{4,24}/.test(password.value)){
//     wanningPass.innerText = "Password không hợp lệ"
//     return false
//   } else {
//     wanningPass.innerText = ""
//   }
//   if(!/[a-zA-Z][a-zA-Z0-9-_]{4,24}/.test(displayName.value)){
//     wanningName.innerText = "Name không hợp lệ"
//     return false
//   } else {
//     wanningName.innerText = ""
//   }
//   if(!/\(?(\d{3})\)?[-\.\s]?(\d{3})[-\.\s]?(\d{4})/.test(telephone.value)){
//     wanningPhone.innerText = "Phone không hợp lệ"
//     return false
//   } else {
//     wanningPhone.innerText = ""
//   }
//   cosnole.log("validate")
//   return true
// }

function checkLogin(){
  const username = document.querySelector('input[name = "Username"]')
  const password = document.querySelector('input[name = "Password"]')
  const wanningUser = document.querySelector('.username_log span')
  const wanningPass = document.querySelector('.password_log span')
  if(username.value == ""){
    wanningUser.innerText = "Nhập tài khoản"
    return false
  } else {
    wanningUser.innerText = ""
  }
  if(password.value == ""){
    wanningPass.innerText = "Nhập mật khẩu"
    return false
  } else {
    wanningPass.innerText = ""
  }
  return true
}
