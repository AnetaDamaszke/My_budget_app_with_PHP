const showPasswordButton = document.querySelector('#showPassword');
const passwordInput = document.querySelector('#password1');

showPasswordButton.addEventListener('click', () => {
  
  if(showPasswordButton.value === "ON"){
    showPasswordButton.value = "OFF";
    passwordInput.setAttribute('type','password');}
  else if(showPasswordButton.value === "OFF"){
    showPasswordButton.value = "ON";
    passwordInput.setAttribute('type','text');}
})

function checkName() {

   const name = document.querySelector("#name").value;
   
   if (!name) {
    document.querySelector("#statement").textContent = "Podaj imię!"
    return false;
  }
   
  return true;
}

function validateEmail() {

  const email = document.querySelector("#email").value;
  const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if(email.match(mailformat)) return true;
  else {
    document.querySelector("#statement").innerHTML = "Niepoprawny adres e-mail!";
    return false;
  }
}

function checkPassword() {

  const password1 = document.querySelector("#password1").value;
  const password2 = document.querySelector("#password2").value;

  if (!password1) {
    document.querySelector("#statement").textContent = "Nie podano hasła!" ;
    return false;
  }
  else {
    if (!password2) {
      document.querySelector("#statement").textContent = "Powtórz hasło!" ;
      return false;
    }
    else {
      if (password1 === password2) return true;
    else {
      document.querySelector("#statement").textContent = "Podano różne hasła!" ;
      return false;
    }
    } 
  }
}

function openNewSite() {
  window.open("login.html", "_self");
}

function validateForm() {

  if ((validateEmail() === true) && (checkPassword() === true) && (checkName() === true)) {
    document.querySelector("#statement").textContent = "Konto zostało pomyślnie utworzone!";
    document.querySelector("#reigistrationButton").textContent = "Zaloguj";
    document.querySelector("#reigistrationButton").addEventListener('click', openNewSite);
  }

}

