document.addEventListener('DOMContentLoaded', () => {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const checkoutBody = document.getElementById('checkoutBody');
    const checkoutTotal = document.getElementById('checkoutTotal');

    function renderCheckout() {
        checkoutBody.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
            const subtotal = item.price * item.qty;
            total += subtotal;

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${item.name}</td>
                <td>${item.price}</td>
                <td>
                    <input type="number" min="1" value="${item.qty}" data-index="${index}" class="qty-input">
                </td>
                <td class="subtotal">${subtotal}</td>
                <td>
                    <button class="btn btn-danger btn-sm remove" data-index="${index}">Delete</button>
                </td>
            `;
            checkoutBody.appendChild(tr);

            // تعديل الكمية
            const input = tr.querySelector('.qty-input');
            input.addEventListener('change', () => {
                let val = parseInt(input.value);
                if (isNaN(val) || val < 1) val = 1;
                item.qty = val;
                updateCart();
            });

            // حذف المنتج
            const removeBtn = tr.querySelector('.remove');
            removeBtn.addEventListener('click', () => {
                cart.splice(index, 1);
                updateCart();
            });
        });

        checkoutTotal.textContent = total.toFixed(2);
    }

    function updateCart() {
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCheckout();
    }

    // زر Place Order
    document.getElementById('placeOrder').addEventListener('click', () => {
        if(cart.length === 0){
            alert("Your cart is empty!");
            return;
        }
        alert("Order placed successfully ✅");
        localStorage.removeItem('cart'); // مسح الكارت بعد الطلب
        cart = [];
        renderCheckout();
    });

    renderCheckout();
});