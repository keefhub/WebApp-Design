function updateQuantity(product_id, size, action) {
  const quantityElement = document.querySelector(
    `[data-product-id="${product_id}"][data-size="${size}"]`
  );
  let quantity = parseInt(quantityElement.innerText);

<<<<<<< HEAD
    if (action === "decrease" && quantity > 1) {
        quantity--;

    } else if (action === "increase") {
        quantity++;
    }
    quantityElement.innerText = quantity;

    fetch('updatecart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=updateQuantity&product_id=' + encodeURIComponent(product_id) +
            '&size=' + encodeURIComponent(size) +
            '&new_quantity=' + encodeURIComponent(quantity),
    });
    location.reload();
=======
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
>>>>>>> 321b338b68fc0d7c0166034facbd35e6fef0ec22
}

function removeItem(product_id, size, element) {
  const cartItem = element.closest(".cart-item");
  cartItem.parentNode.removeChild(cartItem);

<<<<<<< HEAD
    fetch('remove_from_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=updateQuantity&product_id=' + encodeURIComponent(product_id) +
            '&size=' + encodeURIComponent(size),
    });
    location.reload();
}

function checkout(cart) {
    if (cart) {
        document.location.href = './checkout.php';
    }
    else {
        alert("Your cart is empty!");
    }
}
=======
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
>>>>>>> 321b338b68fc0d7c0166034facbd35e6fef0ec22
