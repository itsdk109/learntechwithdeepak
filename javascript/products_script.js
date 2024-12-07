// script.js

// Function to handle adding a product to the cart
function addToCart(productId) {
    alert(`Product with ID: ${productId} has been added to the cart.`);
    
    // You can send an AJAX request to add the product to the cart in the backend
    // Example:
    /*
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_to_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert("Product added to cart successfully!");
        }
    };
    xhr.send("product_id=" + productId);
    */
}

// Function to handle the "Buy Now" action
function buyNow(productId) {
    alert(`Redirecting to the checkout for product ID: ${productId}.`);
    
    // You can redirect the user to a checkout page or initiate the purchase process
    // Example:
    window.location.href = `checkout.php?id=${productId}`;
}
