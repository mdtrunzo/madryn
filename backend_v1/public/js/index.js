//Input saving
const form = document.getElementById('form')
const name = document.getElementById('name')
const lastName = document.getElementById('lastName')
const email = document.getElementById('email')
const submit = document.getElementById('submit')

// Fetch to API
const url = '/api/quiero-mi-cupon-demo'

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
    //window.location.href = "voucher.html";


    

  } catch (err) {
    console.log(err)
  }
})