function confirm_password() {
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirm_password").value;
  if (password !== confirmPassword) {
    document.getElementById("password").style.borderColor = "red";
    document.getElementById("password").style.borderWidth = "2px";
  } else {
    document.getElementById("password").style.borderColor = "green";
    document.getElementById("password").style.borderWidth = "2px";
  }
}
