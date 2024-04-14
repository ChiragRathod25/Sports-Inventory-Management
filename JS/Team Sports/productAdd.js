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
    div.innerHTML = '<div>'+'<label for="specification_name' + specificationId + '">Specification Name:</label>' +
                    '<input type="text" id="specification_name' + specificationId + '" name="specifications[' + specificationId + '][name]">' +' </div><div class=flex-column>'+
                    '<label for="value' + specificationId + '">  Value:</label>' +
                    '<input type="text" id="value' + specificationId + '" name="specifications[' + specificationId + '][value]">'+'</div>';
                    div.setAttribute('class', 'flex-row');
    container.appendChild(div);
    specificationId++;
});

//images
// document.querySelector('form').addEventListener('submit', (e) => {
//     e.preventDefault();
//     console.log('form submitted');
//     // this.querySelector('input[type="submit"]').disabled = true; 
//     const formData = new FormData(e.target);
//     fetch('./validateProductAddForm.php', {
//         method: 'POST',
//         body: formData
//     })
//     .then(response => response.text())
//     .then(data => {
//         console.log(data);
//         if (data.success) {
//             alert('Product added successfully with product ID: ' + data.productID);
//             window.location.href = './productadd.php';
//         } else {
//             console.error(data.error);
//         }
//     })
//     .catch(error => console.error(error));
// });

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
        alert('Product Added successfully'); 
        window.location.href = './productadd.php';

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