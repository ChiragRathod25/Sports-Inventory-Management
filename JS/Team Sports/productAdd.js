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

document.querySelector('form').addEventListener('submit', (e) => {
    e.preventDefault();
    console.log('form submitted');
    const formData = new FormData(e.target);
    fetch('./validateProductAddForm.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        let response = JSON.parse(data);

if (response.success) { // Check if the product was added successfully
    console.log(response.success)
    alert(`Product Added successfully `); 
    window.location.href = './productadd.php';
} else {
    alert(`Failed to add product ${response.error}` ); // Show the error message
}

    })
    .catch(error => console.error(error));
});




//form validation
function validateForm(form){
    var variantsContainer = document.getElementById('variantsContainer');
    console.log(variantsContainer.length)
    // Count the number of variant blocks
    var variantCount = variantsContainer.children.length;

    // Check if the variantCount is within the desired range
   

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
     if (variantCount < 1) {
        alert('At least one variant is required.'); // Display error message
        return false;
    } else if (variantCount > 5) {
        alert('No more than 5 variants are allowed.'); // Display error message
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
