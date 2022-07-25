const showPasswordButton = document.querySelector('#showPassword');
const passwordInput = document.querySelector('#password');

showPasswordButton.addEventListener('click', () => {
  
  if(showPasswordButton.value === "ON"){
    showPasswordButton.value = "OFF";
    passwordInput.setAttribute('type','password');}
  else if(showPasswordButton.value === "OFF"){
    showPasswordButton.value = "ON";
    passwordInput.setAttribute('type','text');}
})

function checkEmail() {

   const email = document.querySelector("#email").value;
   const userEmail = "aneta@gmail.com";
   
    if (email === userEmail) return true;
    else {
      document.querySelector("#loginStatement").innerHTML = "Niepoprawny email!"
      return false;
    }
}

function checkPassword() {

  const password = document.querySelector("#password").value;
  const userPassword = "123";

  if (password === userPassword) return true; 
  else {
    document.querySelector("#loginStatement").textContent = "Niepoprawne hasło!"
    return false;
  }
}

function checkUser() {

  if ((checkEmail() === true) && (checkPassword() === true)) {
      window.open("menu.html", "_self");
  }
  else document.querySelector("loginStatement").textContent = "Błąd logowania!";
}
