

function updateCategories(sportId) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "./productDetails.php?sport_id=" + sportId, true);
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var categoryDropdown = document.getElementById("category");
            categoryDropdown.innerHTML = this.responseText;
            console.log(this.responseText)
        }
    };
    xhr.send();
}


//specification
var specificationId = 0;
document.getElementById("addSpecification").addEventListener("click", function() {
    var container = document.getElementById("specificationsContainer");
    var div = document.createElement("div");
    div.innerHTML = '<label for="specification_name' + specificationId + '">Specification Name:</label>' +
                    '<input type="text" id="specification_name' + specificationId + '" name="specifications[' + specificationId + '][name]">' +
                    '<label for="value' + specificationId + '">  Value:</label>' +
                    '<input type="text" id="value' + specificationId + '" name="specifications[' + specificationId + '][value]">';
    container.appendChild(div);
    specificationId++;
});

//form validation
function validateForm(form){
    if(form.sport.value==""){
        alert(`Please Select Sport `);
        form.sport.focus();
        return false;
    }
    if(form.category.value==""){
        alert(`Please Select Category `);
        form.category.focus();
        return false;
    }
    return true;
}