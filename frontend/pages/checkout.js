function updateQuantity(product_id, size, action) {
    const quantityElement = document.querySelector(`[data-product-id="${product_id}"][data-size="${size}"]`);
    let quantity = parseInt(quantityElement.innerText);

    if (action === "decrease" && quantity > 1) {
        quantity--;
    } else if (action === "increase") {
        quantity++;
    }

    quantityElement.innerText = quantity;
}

function removeItem(product_id, size, element) {
    const cartItem = element.closest('.cart-item');
    cartItem.parentNode.removeChild(cartItem);
}
