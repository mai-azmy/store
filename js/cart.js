// function addToCart(id, name, price) {

//   let cart = JSON.parse(localStorage.getItem("cart")) || [];

//   let found = cart.find(item => item.id === id);

//   if (found) {
//     found.quantity++;
//   } else {
//     cart.push({ id, name, price, quantity: 1 });
//   }

//   localStorage.setItem("cart", JSON.stringify(cart));

//   alert("Added to Cart ✅");
// }


function addToCart(id, name, price) {

  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  let found = cart.find(item => item.id === id);

  if (found) {
    found.qty++; // مهم
  } else {
    cart.push({ id, name, price, qty: 1 }); // مهم
  }

  localStorage.setItem("cart", JSON.stringify(cart));

  // يوديه على صفحة الكارت
  window.location.href = "cart.php";
}



// cart.js
// let cart = JSON.parse(localStorage.getItem('cart')) || [];

// const cartTableBody = document.querySelector('#cartTable tbody');
// const cartTotalEl = document.getElementById('cartTotal');

// function renderCart() {
//     cartTableBody.innerHTML = '';
//     let total = 0;
//     cart.forEach((item, index) => {
//         const subtotal = item.price * item.qty;
//         total += subtotal;

//         const tr = document.createElement('tr');
//         tr.classList.add('animate__animated','animate__fadeIn');

//         tr.innerHTML = `
//             <td>${item.name}</td>
//             <td>${item.price} EGP</td>
//             <td>
//                 <input type="number" min="1" value="${item.qty}" class="form-control qty-input" data-index="${index}">
//             </td>
//             <td>${subtotal} EGP</td>
//             <td>
//                 <button class="btn btn-danger btn-sm remove-btn" data-index="${index}">Delete</button>
//             </td>
//         `;
//         cartTableBody.appendChild(tr);
//     });
//     cartTotalEl.textContent = total;
// }

// document.addEventListener('DOMContentLoaded', () => {
//     const cartContainer = document.getElementById('cartContainer');
//     const cartTotalEl = document.getElementById('cartTotal');

//     function loadCart() {
//         const cart = JSON.parse(localStorage.getItem('cart')) || [];
//         cartContainer.innerHTML = ''; // تفريغ الحاوية
//         let total = 0;

//         cart.forEach(item => {
//             total += item.price * item.qty;

//             const card = document.createElement('div');
//             card.className = 'col-12 mb-3';
//             card.innerHTML = `
//                 <div class="d-flex align-items-center cart-card p-3 shadow-sm rounded">
//                     <img src="../images/${item.image || 'default.png'}" class="cart-img me-3">
//                     <div class="flex-grow-1">
//                         <h5>${item.name}</h5>
//                         <p class="text-primary">${item.price} EGP</p>
//                         <div class="d-flex align-items-center mt-2">
//                             <button class="qty-btn btn btn-outline-dark">-</button>
//                             <input type="text" value="${item.qty}" class="form-control text-center qty-input" style="width:50px;">
//                             <button class="qty-btn btn btn-outline-dark">+</button>
//                             <button class="remove-btn ms-3">Remove</button>
//                         </div>
//                     </div>
//                 </div>
//             `;
//             cartContainer.appendChild(card);

//             // التعامل مع الكمية
//             const minusBtn = card.querySelector('.qty-btn:first-of-type');
//             const plusBtn = card.querySelector('.qty-btn:last-of-type');
//             const qtyInput = card.querySelector('.qty-input');
//             const removeBtn = card.querySelector('.remove-btn');

//             minusBtn.addEventListener('click', () => {
//                 if(item.qty > 1) item.qty--;
//                 qtyInput.value = item.qty;
//                 updateCart(cart);
//             });

//             plusBtn.addEventListener('click', () => {
//                 item.qty++;
//                 qtyInput.value = item.qty;
//                 updateCart(cart);
//             });

//             qtyInput.addEventListener('change', () => {
//                 let val = parseInt(qtyInput.value);
//                 if(isNaN(val) || val < 1) val = 1;
//                 item.qty = val;
//                 qtyInput.value = item.qty;
//                 updateCart(cart);
//             });

//             removeBtn.addEventListener('click', () => {
//                 const index = cart.findIndex(ci => ci.id === item.id);
//                 if(index > -1) cart.splice(index,1);
//                 updateCart(cart);
//                 loadCart(); // إعادة تحميل
//             });
//         });

//         cartTotalEl.textContent = total.toFixed(2);
//     }

//     function updateCart(cart) {
//         localStorage.setItem('cart', JSON.stringify(cart));
//         loadCart();
//     }

//     loadCart();
// });



// document.addEventListener('DOMContentLoaded', () => {

//     const cartContainer = document.getElementById('cartContainer');
//     const cartTotalEl = document.getElementById('cartTotal');

//     function loadCart() {
//         let cart = JSON.parse(localStorage.getItem('cart')) || [];
//         cartContainer.innerHTML = '';
//         let total = 0;

//         cart.forEach((item, index) => {

//             total += item.price * item.qty;

//             const div = document.createElement('div');
//             div.className = 'col-12 mb-3';

//             div.innerHTML = `
//                 <div class="d-flex align-items-center p-3 shadow rounded">
//                     <div class="flex-grow-1">
//                         <h5>${item.name}</h5>
//                         <p>${item.price} EGP</p>

//                         <div class="d-flex align-items-center">
//                             <button class="btn btn-outline-dark btn-sm minus">-</button>
//                             <input type="text" value="${item.qty}" class="form-control mx-2 text-center" style="width:60px;">
//                             <button class="btn btn-outline-dark btn-sm plus">+</button>
//                             <button class="btn btn-danger btn-sm ms-3 remove">Delete</button>
//                         </div>
//                     </div>
//                 </div>
//             `;

//             cartContainer.appendChild(div);

//             const minus = div.querySelector('.minus');
//             const plus = div.querySelector('.plus');
//             const input = div.querySelector('input');
//             const remove = div.querySelector('.remove');

//             minus.onclick = () => {
//                 if (item.qty > 1) item.qty--;
//                 updateCart(cart);
//             };

//             plus.onclick = () => {
//                 item.qty++;
//                 updateCart(cart);
//             };

//             input.onchange = () => {
//                 let val = parseInt(input.value);
//                 if (isNaN(val) || val < 1) val = 1;
//                 item.qty = val;
//                 updateCart(cart);
//             };

//             remove.onclick = () => {
//                 cart.splice(index, 1);
//                 updateCart(cart);
//             };
//         });

//         cartTotalEl.textContent = total.toFixed(2);
//     }

//     function updateCart(cart) {
//         localStorage.setItem('cart', JSON.stringify(cart));
//         loadCart();
//     }

//     loadCart();
// });

// cart.js

document.addEventListener('DOMContentLoaded', () => {
    const cartContainer = document.getElementById('cartContainer');
    const cartTotalEl = document.getElementById('cartTotal');

    function loadCart() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cartContainer.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
            const subtotal = item.price * item.qty;
            total += subtotal;

            const div = document.createElement('div');
            div.className = 'col-12 mb-3';

            div.innerHTML = `
                <div class="d-flex align-items-center p-3 shadow rounded">
                    <div class="flex-grow-1">
                        <h5>${item.name}</h5>
                        <p>Price: ${item.price} EGP</p>
                        <p>Subtotal: <span class="item-subtotal">${subtotal.toFixed(2)}</span> EGP</p>

                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-dark btn-sm minus">-</button>
                            <input type="number" min="1" value="${item.qty}" class="form-control mx-2 text-center" style="width:60px;">
                            <button class="btn btn-outline-dark btn-sm plus">+</button>
                            <button class="btn btn-danger btn-sm ms-3 remove">Delete</button>
                        </div>
                    </div>
                </div>
            `;

            cartContainer.appendChild(div);

            const minus = div.querySelector('.minus');
            const plus = div.querySelector('.plus');
            const input = div.querySelector('input');
            const remove = div.querySelector('.remove');
            const subtotalEl = div.querySelector('.item-subtotal');

            // تقليل الكمية
            minus.onclick = () => {
                if (item.qty > 1) item.qty--;
                input.value = item.qty;
                subtotalEl.textContent = (item.price * item.qty).toFixed(2);
                updateCart(cart);
            };

            // زيادة الكمية
            plus.onclick = () => {
                item.qty++;
                input.value = item.qty;
                subtotalEl.textContent = (item.price * item.qty).toFixed(2);
                updateCart(cart);
            };

            // تغيير الكمية يدويًا
            input.onchange = () => {
                let val = parseInt(input.value);
                if (isNaN(val) || val < 1) val = 1;
                item.qty = val;
                input.value = item.qty;
                subtotalEl.textContent = (item.price * item.qty).toFixed(2);
                updateCart(cart);
            };

            // حذف المنتج
            remove.onclick = () => {
                cart.splice(index, 1);
                updateCart(cart);
            };
        });

        // تحديث المجموع الكلي
        cartTotalEl.textContent = total.toFixed(2);
    }

    function updateCart(cart) {
        localStorage.setItem('cart', JSON.stringify(cart));
        loadCart();
    }

    loadCart();
});

