function addToCart(productId) {
    // AJAX request to add the product to cart
    fetch(`add_to_cart.php?id=${productId}`)
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        });
}

function buyNow(productId) {
    window.location.href = `checkout.php?id=${productId}`;
}
