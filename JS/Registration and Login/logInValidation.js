console.log("loginValidation.js Loaded");

function validateForm(form) {
  if (form.username.value === "") {
    alert("please enter username :");
    form.username.focus();
    return false;
  }
  //email validation
  const email = /^\w+@[a-zA-z]+\.[a-zA-z]{2,4}$/;
  if (!email.test(form.email.value)) {
    alert("please enter valid email");
    form.email.focus();
    return false;
  }

  //mobile Number
  /* const mobileNumber=/^[1-9]\d{9}$/
    if(!mobileNumber.test(form.mobileNumber.value)){
        alert('please enter valid mobile number');
        form.mobileNumber.focus();
        return false;
    }
*/

  //password validation
  const password = /^\w{5,8}$/;
  if (!password.test(form.password.value)) {
    alert("please enter password (5-8 charactar)");
    form.password.focus();
    return false;
  }
  alert(`Welcome to HTI Sports ${form.username.value}`);
  return true;
}
