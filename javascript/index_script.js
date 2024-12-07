const products = [
    [
        { name: "Product 1", price: "$29.99", image: "https://via.placeholder.com/300x300" },
        { name: "Product 2", price: "$39.99", image: "https://via.placeholder.com/300x300" },
        { name: "Product 3", price: "$49.99", image: "https://via.placeholder.com/300x300" },
    ],
    [
        { name: "Product 4", price: "$59.99", image: "https://via.placeholder.com/300x300" },
        { name: "Product 5", price: "$69.99", image: "https://via.placeholder.com/300x300" },
        { name: "Product 6", price: "$79.99", image: "https://via.placeholder.com/300x300" },
    ],
    [
        { name: "Product 7", price: "$89.99", image: "https://via.placeholder.com/300x300" },
        { name: "Product 8", price: "$99.99", image: "https://via.placeholder.com/300x300" },
        { name: "Product 9", price: "$109.99", image: "https://via.placeholder.com/300x300" },
    ],
    [
        { name: "Product 10", price: "$119.99", image: "https://via.placeholder.com/300x300" },
        { name: "Product 11", price: "$129.99", image: "https://via.placeholder.com/300x300" },
        { name: "Product 12", price: "$139.99", image: "https://via.placeholder.com/300x300" },
    ],
];

let currentPage = 1;

function renderProducts(page) {
    const productGrid = document.getElementById("dynamic-products");
    productGrid.innerHTML = ""; // Clear existing content

    // Load products for the selected page
    const pageProducts = products[page - 1];
    pageProducts.forEach((product) => {
        const productHTML = `
            <div class="product">
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>${product.price}</p>
                <div class="buttons">
                    <button>Buy Now</button>
                    <button>Add to Cart</button>
                </div>
            </div>
        `;
        productGrid.innerHTML += productHTML;
    });
}

function changePage(page) {
    const totalPages = products.length;

    if (page === "prev") {
        if (currentPage > 1) {
            currentPage--;
        }
    } else if (page === "next") {
        if (currentPage < totalPages) {
            currentPage++;
        }
    } else {
        currentPage = page;
    }

    // Update active page style
    document.querySelectorAll(".page-number").forEach((link) => {
        link.classList.remove("active");
    });
    document
        .querySelector(`.page-number:nth-child(${currentPage + 1})`)
        .classList.add("active");

    // Render products for the current page
    renderProducts(currentPage);
}

// Initialize
document.addEventListener("DOMContentLoaded", () => {
    renderProducts(currentPage);
});


document.addEventListener('DOMContentLoaded', () => {
    // Add event listeners to all "Buy Now" buttons
    document.querySelectorAll('.buttons button:nth-child(1)').forEach((buyNowButton, index) => {
        buyNowButton.addEventListener('click', () => {
            alert(`Buy Now clicked for Product ${index + 1}`);
            // Redirect to a checkout page
            window.location.href = `checkout.php?product=${index + 1}`; // Example: product ID passed in the URL
        });
    });

    // Add event listeners to all "Add to Cart" buttons
    document.querySelectorAll('.buttons button:nth-child(2)').forEach((addToCartButton, index) => {
        addToCartButton.addEventListener('click', () => {
            const productId = index + 1; // Example product ID
            fetch(`add_to_cart.php?id=${productId}`, {
                method: 'GET',
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message); // Show the response message
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
});
