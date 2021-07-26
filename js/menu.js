//Mobile menu 
const fullWidthMenu = document.querySelector('.full-width-menu')
const navicon = document.querySelector('.navicon')
const close = document.querySelector('.close')

navicon.addEventListener('click', () => {
  fullWidthMenu.style.display = 'block'
})

close.addEventListener('click', () => {
  fullWidthMenu.style.display = 'none'
})