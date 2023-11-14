function updateQuantity(product_id, size, action) {
  const quantityElement = document.querySelector(
    `[data-product-id="${product_id}"][data-size="${size}"]`
  );
  let quantity = parseInt(quantityElement.innerText);

  if (action === "decrease" && quantity > 1) {
    quantity--;
  } else if (action === "increase") {
    quantity++;
  }
  quantityElement.innerText = quantity;

  fetch("updatecart.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body:
      "action=updateQuantity&product_id=" +
      encodeURIComponent(product_id) +
      "&size=" +
      encodeURIComponent(size) +
      "&new_quantity=" +
      encodeURIComponent(quantity),
  });
}

function removeItem(product_id, size, element) {
  const cartItem = element.closest(".cart-item");
  cartItem.parentNode.removeChild(cartItem);

  fetch("remove_from_cart.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body:
      "action=updateQuantity&product_id=" +
      encodeURIComponent(product_id) +
      "&size=" +
      encodeURIComponent(size),
  });
}

function checkout() {
  document.location.href = "./checkout.php";
}
