//This JS handle the functionality of the product page like add to card, remove from cart, update cart, etc.
console.log('loaded');
document.querySelectorAll('.add-to-cart').forEach(function(event) {
    button.addEventListener('submit', function() {
        var productId = this.getAttribute('data-product-id');
        var form = this;
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();

        xhr.open('POST', '/Sports-Inventory-Management/PHP/add_to_cart.php');
        // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            }
            else{
                alert('Error: ' + xhr.responseText);
            }
        };
        xhr.send(formData);
    });
    
    // event.preventDefault();
    // xhr.onreadystatechange = function() {
    //     if (xhr.readyState === 4 && xhr.status === 200) {
    //         var response = xhr.responseText;
    //         if (response === "success") {
    //             alert("Account created successfully!");
    //             window.location.href = "./cust_login.html";
    //             form.reset();
    //         } else if (response === "not_available") {
    //             alert("This username is not available.");
    //             form.username.focus();
    //         } else {
    //             alert("Error: " + response);
    //         }
    //     }
    // };
    // xhr.send(formData);

});

