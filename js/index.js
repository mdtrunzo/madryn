//Input saving
const form = document.getElementById('form')
const name = document.getElementById('name')
const lastName = document.getElementById('lastName')
const email = document.getElementById('email')
const submit = document.querySelector('#submit')

submit.addEventListener('click', (e) => {
  const nameValue = name.value
  const lastNameValue = lastName.value
  const emailValue = email.value

  //Save in local storage
  const nameStorage = localStorage.setItem('Name', nameValue)
  const lastNameStorage = localStorage.setItem('Last Name', lastNameValue)
  const emailStorage = localStorage.setItem('Email', emailValue)

  name.value = ''
  lastName.value = ''
  email.value = ''

  window.location.href = "voucher.html";

  e.preventDefault()
})