const output = document.querySelector('.output')
const loader = document.querySelector('.loader-container')
const containerVoucher = document.querySelector('.container-voucher')

window.onload = function getContent() {
  loadingPage()
  output.innerHTML = localStorage.getItem('html_form')
}

function loadingPage() {
  setTimeout(() => {
    loader.style.display = 'none'
    containerVoucher.style.display = 'block'
  }, 1500)
}