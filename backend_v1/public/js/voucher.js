const output = document.querySelector('.output')
const loader = document.querySelector('.loader-container')
const containerVoucher = document.querySelector('.container-voucher')

window.onload = function getContent() {
  loadingPage()

  fetch('js/db.json')
    .then(res => {
      return res.json()
    })
    .then(data => {
      data.forEach(post => {
        output.innerHTML += `
        <div class="usuario-ganador">
          <h2>${(localStorage.getItem('Name').toUpperCase())} ${(localStorage.getItem('Last Name').toUpperCase())}</h2>
          <p>${localStorage.getItem('Email')}</p>
        </div>
        <div class="premio">
          <div class="ganaste-container">
           <span class="ganaste">GANASTE</span>
          </div>
          <p class="premio-title">${post.premio}<br>en</br></p>
          <div class="local-voucher">
             <div class="imagen-voucher">
               <img src="${post.img}" width="200">
              </div>
             <div class="info-voucher">
               <h2>${post.prestador}</h2>
               <p>Tel: ${post.telefono} </p>
               <p>Dirección: ${post.direccion}</p>
             </div>
          </div>
        </div>
    `
      })
    })
    .catch(function (err) {
      console.log(err)
    })
}

function loadingPage() {
  setTimeout(() => {
    loader.style.display = 'none'
    containerVoucher.style.display = 'block'
  }, 1500)
}