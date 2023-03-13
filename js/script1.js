var keyboardContainer = document.getElementById("lks");
var inputField = document.getElementById("clave");

function toggleKeyboard() {
  if (keyboardContainer.style.display === "none") {
    keyboardContainer.style.display = "block";
  } else {
    keyboardContainer.style.display = "none";
  }
}

inputField.addEventListener("click", toggleKeyboard);

document.addEventListener("click", function(event) {
  var isClickInside = keyboardContainer.contains(event.target) || inputField === event.target;
  if (!isClickInside) {
    keyboardContainer.style.display = "none";
  }
});



function addDigit(digit) {
  const input = document.getElementById("clave");
  if (input.value.length < 6) { // Verificar si el valor del campo tiene menos de 6 dígitos
    input.value += digit;
  }
}
