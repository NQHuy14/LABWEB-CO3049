"use strict";

var password = document.getElementById("loginPassword");
var errorMessage = document.getElementById("errorPassMessage");

password.addEventListener("input", () => {
  if (password.value.length < 8) {
    errorMessage.style.display = "block";
  } else {
    errorMessage.style.display = "none";
  }
});
