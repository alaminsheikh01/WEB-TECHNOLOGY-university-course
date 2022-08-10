function validate(pForm) {
  let isValid = "";

  if (pForm.name.value === "") {
    document.getElementById("nameErr").innerHTML = "Please fill up the name.";
    isValid = "Not Valid";
  }
  if (pForm.email.value === "") {
    document.getElementById("emailErr").innerHTML =
      "Please fill up the email email";
    isValid = "Not Valid";
  }
  if (pForm.phone.value === "") {
    document.getElementById("phoneErr").innerHTML = "Please fill up the phone";
    isValid = "Not Valid";
  }
  if (pForm.company.value === "") {
    document.getElementById("companyErr").innerHTML =
      "Please fill up the company";
    isValid = "Not Valid";
  }
  if (pForm.address.value === "") {
    document.getElementById("addressErr").innerHTML =
      "Please fill up the address";
    isValid = "Not Valid";
  }

  if (isValid === "") {
    return true;
  } else {
    return false;
  }
}
