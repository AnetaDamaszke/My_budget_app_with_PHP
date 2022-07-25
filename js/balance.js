
function showStatement() {

  const balanceSum = document.querySelector("#balanceSum").innerHTML;

  if(balanceSum >= 0) document.querySelector("#balanceSumStatement").textContent = "Gratulacje! Świetnie zarządzasz finansami!";
  else document.querySelector("#balanceSumStatement").textContent = "Uważaj! Wpadasz w długi!";
}

window.onload = showStatement;