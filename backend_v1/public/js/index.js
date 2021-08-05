//Input saving
const form = document.getElementById('form')
const name = document.getElementById('name')
const lastName = document.getElementById('lastName')
const email = document.getElementById('email')
const submit = document.getElementById('submit')
const msg = document.querySelector('.alert-msg')

// Fetch to API
const url = 'https://flexit.com.ar/madryn/madryn/backend_v1/public/api/quiero-mi-cupon-demo'
// const url = 'http://127.0.0.1:8000/api/quiero-mi-cupon-demo'

form.addEventListener('submit', async (e) => {
  e.preventDefault()
  //Save to LS
  const nameValue = name.value
  const lastNameValue = lastName.value
  const emailValue = email.value

  const nameStorage = localStorage.setItem('Name', nameValue)
  const lastNameStorage = localStorage.setItem('Last Name', lastNameValue)
  const emailStorage = localStorage.setItem('Email', emailValue)

  //Fetch
  const formData = new FormData(form)
  const formDataSerial = Object.fromEntries(formData)
  const jsonObject = {
    ...formDataSerial
  }

  try {
    const response = await fetch(url, {
      method: "POST",
      body: JSON.stringify(jsonObject),
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json"
      },
    })
    const json = await response.json()
    if (json.success === 'false') {
      msg.style.display = 'block'
      setTimeout(() => {
        msg.style.display = 'none'
      }, 2000)
    } else {
      const htmlStorage = localStorage.setItem('html_form', json.html)
      window.location.href = "voucher.php";
    }

  } catch (err) {
    console.log(err)
  }
})