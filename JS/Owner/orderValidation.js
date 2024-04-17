function validateGSTIN(gstin) {
    var regex = /^[0-9A-Za-z]{15}$/;
    return regex.test(gstin);}
function validateEmail(email) {
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}
function validatePhoneNumber(phoneNumber) {
    var regex = /^[6-9]\d{9}$/;
    return regex.test(phoneNumber);
}

function validateForm() {
    var gstin = document.getElementById('gstin').value;
    var email = document.getElementById('emailId').value;
    var phoneNumber = document.getElementById('phoneNumber').value;

    var isValid = true;
    if (!validateGSTIN(gstin)) {
        isValid = false;
        alert('Please enter a valid GSTIN.');
        return isValid;
    }
    if (!validateEmail(email)) {
        isValid = false;
        alert('Please enter a valid email address.');
        return isValid;
    }
    if (!validatePhoneNumber(phoneNumber)) {
        isValid = false;
        alert('Please enter a valid phone number.');
        return isValid;
    }

    return isValid;
}
// document.getElementById('purchaseOrderForm').onsubmit = function() {
//     return validateForm();
// };
