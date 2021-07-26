const output = document.querySelector('.output')
const loader = document.querySelector('.loader-container')
const containerVoucher = document.querySelector('.container-voucher')

window.onload = function () {
  loadingPage()

  output.innerHTML = output.innerHTML = `
    <div class="usuario-ganador">
      <h2>${localStorage.getItem('Name')} ${localStorage.getItem('Last Name')}</h2>
      <p>${localStorage.getItem('Email')}</p>
    </div>
    <span class="ganaste">GANASTE</span>
    <div class="premio">
      <p>15% DE DESCUENTO EN SNORKELING CON LOBOS MARINOS <br>en</br></p>
      <div class="local-voucher">
         <div class="imagen-voucher">
           <img src="img/puerto-madryn-me-emociona-madryn-logo.png" width="100">
         </div>
         <div class="info-voucher">
           <h2>ABRAMAR BUCERO</h2>
           <p>Tel: (280) 555555 </p>
           <p>Dirección: xxxxxxx </p>
         </div>
      </div>
    </div>
`

};

function loadingPage() {
  setTimeout(() => {
    loader.style.display = 'none'
    containerVoucher.style.display = 'block'
  }, 2000)
}