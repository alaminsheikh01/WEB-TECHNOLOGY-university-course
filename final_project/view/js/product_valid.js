function validate(pForm) {
  let isValid = "";

  if (pForm.image.value === "") {
    document.getElementById("imageErr").innerHTML = "Please fill up the image.";
    isValid = "Not Valid";
  }
  if (pForm.title.value === "") {
    document.getElementById("titleErr").innerHTML = "Please fill up the title";
    isValid = "Not Valid";
  }
  if (pForm.price.value === "") {
    document.getElementById("priceErr").innerHTML = "Please fill up the price";
    isValid = "Not Valid";
  }
  if (pForm.image_text.value === "") {
    document.getElementById("imageTextErr").innerHTML =
      "Please fill up the ImageText";
    isValid = "Not Valid";
  }

  if (isValid === "") {
    return true;
  } else {
    return false;
  }
}
