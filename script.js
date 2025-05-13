let cart = [];

function searchProducts() {
    let input = document.getElementById('search').value.toLowerCase();
    let products = document.getElementsByClassName('product');

    for (let product of products) {
        let name = product.getAttribute('data-name').toLowerCase();
        product.style.display = name.includes(input) ? 'inline-block' : 'none';
    }
}

function addToCart(name, price, image) {
    let existingItem = cart.find(item => item.name === name);
    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({ name, price, image, quantity: 1 });
    }
    updateCartCount();
}

function updateCartCount() {
    document.getElementById('cart-count').innerText = cart.reduce((total, item) => total + item.quantity, 0);
}

function viewCart() {
    let cartQuery = cart.map(item => 
        `name[]=${encodeURIComponent(item.name)}&price[]=${item.price}&quantity[]=${item.quantity}&image[]=${encodeURIComponent(item.image)}`
    ).join('&');
    window.location.href = `product.html?${cartQuery}`;
}

function updateQuantity(name, change) {
    let item = cart.find(item => item.name === name);
    if (item) {
        item.quantity = Math.max(1, item.quantity + change);
        updateCartCount();
    }
}
