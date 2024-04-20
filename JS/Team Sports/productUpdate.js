function updateCategories(sportId) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "./productDetails.php?sport_id=" + sportId, true);
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var categoryDropdown = document.getElementById("category");
            categoryDropdown.innerHTML = this.responseText;
            // console.log(this.responseText)
        }
    };
    xhr.send();
}
//specification
var specificationId = 0;
document.getElementById("addSpecification").addEventListener("click", function() {
    var container = document.getElementById("specificationsContainer");
    var div = document.createElement("div");
    div.innerHTML = '<div>'+'<label for="specification_name' + specificationId + '">Specification Name:</label>' +
                    '<input type="text" id="specification_name' + specificationId + '" name="specifications[' + specificationId + '][name]">' +' </div><div class=flex-column>'+
                    '<label for="value' + specificationId + '">  Value:</label>' +
                    '<input type="text" id="value' + specificationId + '" name="specifications[' + specificationId + '][value]">'+'</div>';
                    div.setAttribute('class', 'flex-row');
    container.appendChild(div);
    specificationId++;
});

document.getElementById("productUpdateForm").addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(e.target); // Collect form data
    fetch('/php/owner/validateProductUpdateForm.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        alert('Product Updated successfully'); 
        window.location.href = './viewProduct.php';
    })
    .catch(error => console.error(error));
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

var variantId = 0;
document.getElementById("addVariant").addEventListener("click", function() {
    var container = document.getElementById("variantsContainer");
    var div = document.createElement("div");
    div.innerHTML = '<div>' +
                    '<label for="size' + variantId + '">Size:</label>' +
                    '<input type="text" id="size' + variantId + '" name="variants[' + variantId + '][size]">' +
                    '</div>' +
                    '<div>' +
                    '<label for="color' + variantId + '">Color:</label>' +
                    '<input type="text" id="color' + variantId + '" name="variants[' + variantId + '][color]">' +
                    '</div>' +
                    '<div>' +
                    '<label for="quantity' + variantId + '">Quantity:</label>' +
                    '<input type="number" id="quantity' + variantId + '" name="variants[' + variantId + '][quantity]">' +
                    '</div>';
    div.setAttribute('class', 'flex-row');
    container.appendChild(div);
    variantId++;
});

var variantId = 0;
document.getElementById("addVariant").addEventListener("click", function() {
    var container = document.getElementById("variantsContainer");
    var div = document.createElement("div");
    div.innerHTML = '<div>' +
                    '<label for="size' + variantId + '">Size:</label>' +
                    '<input type="text" id="size' + variantId + '" name="variants[' + variantId + '][size]">' +
                    '</div>' +
                    '<div>' +
                    '<label for="color' + variantId + '">Color:</label>' +
                    '<input type="text" id="color' + variantId + '" name="variants[' + variantId + '][color]">' +
                    '</div>' +
                    '<div>' +
                    '<label for="quantity' + variantId + '">Quantity:</label>' +
                    '<input type="number" id="quantity' + variantId + '" name="variants[' + variantId + '][quantity]">' +
                    '</div>';
    div.setAttribute('class', 'flex-row');
    container.appendChild(div);
    variantId++;
});