// Data keranjang belanja
let cartItems = [
  {
    id: 1,
    name: "3 Diamonds",
    description: "3Dm, ASW Olshop Game",
    price: 700,
    quantity: 1,
    image: "image/ml/topup1.webp",
  },
  {
    id: 2,
    name: "3 Diamonds",
    description: "3Dm, ASW Olshop Game",
    price: 1000,
    quantity: 1,
    image: "image/ml/topup2.webp",
  },
  {
    id: 3,
    name: "Weekly Diamond Pass",
    description: "WDP, ASW Olshop Game",
    price: 27400,
    quantity: 2,
    image: "image/ml/wdp1.webp",
  },
  {
    id: 4,
    name: "Legend Per Bintang",
    description: "Joki Akun, ASW Olshop Game",
    price: 2100,
    quantity: 1,
    image: "image/ml/jokiakun.webp",
  },
];

// Format mata uang Rupiah
function formatCurrency(amount) {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
  }).format(amount);
}

function renderCartItems() {
  const cartContainer = document.getElementById("cartItems");

  if (cartItems.length === 0) {
    cartContainer.innerHTML = `
        <div class="empty-cart">
            <div class="empty-cart-icon">🛒</div>
            <h3>Keranjang Anda Kosong</h3>
            <p>Belum ada produk yang ditambahkan ke keranjang</p>
            <a href="#" class="continue-shopping" onclick="addSampleItems()">Tambah Produk Sample</a>
        </div>
    `;
    return;
  }

  cartContainer.innerHTML = cartItems
    .map(
      (item) => `
        <div class="cart-item">
            <div class="item-image">
                <img src="${item.image}" alt="${item.name}" />
            </div>
            <div class="item-details">
                <h3>${item.name}</h3>
                <p>${item.description}</p>
            </div>
            <div class="item-price">${formatCurrency(item.price)}</div>
            <div class="quantity-controls">
                <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity - 1})">-</button>
                <input type="number" class="quantity-input" value="${item.quantity}" onchange="updateQuantity(${item.id}, this.value)" min="1">
                <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity + 1})">+</button>
            </div>
            <div class="item-controls">
                <button class="remove-btn" onclick="removeItem(${item.id})">Hapus</button>
            </div>
        </div>
    `
    )
    .join("");
}

// Update jumlah item
function updateQuantity(itemId, newQuantity) {
  newQuantity = Number.parseInt(newQuantity);

  if (newQuantity < 1) {
    removeItem(itemId);
    return;
  }

  const itemIndex = cartItems.findIndex((item) => item.id === itemId);
  if (itemIndex !== -1) {
    cartItems[itemIndex].quantity = newQuantity;
    renderCartItems();
    updateSummary();
    saveCartToStorage();
  }
}

// Hapus item dari keranjang
function removeItem(itemId) {
  const itemIndex = cartItems.findIndex((item) => item.id === itemId);
  if (itemIndex !== -1) {
    const itemName = cartItems[itemIndex].name;
    cartItems.splice(itemIndex, 1);
    renderCartItems();
    updateSummary();
    saveCartToStorage();
  }
}

// Update ringkasan pesanan
function updateSummary() {
  const subtotal = cartItems.reduce((total, item) => total + item.price * item.quantity, 0);
  const shipping = cartItems.length > 0 ? 15000 : 0;
  const tax = subtotal * 0.1;
  const total = subtotal + shipping + tax;

  document.getElementById("subtotal").textContent = formatCurrency(subtotal);
  document.getElementById("shipping").textContent = formatCurrency(shipping);
  document.getElementById("tax").textContent = formatCurrency(tax);
  document.getElementById("total").textContent = formatCurrency(total);
}

// Proses checkout (redirect ke halaman pembayaran)
function redirectToPayment() {
  if (cartItems.length === 0) {
    alert("Keranjang Anda kosong!");
    return;
  }

  const subtotal = cartItems.reduce((sum, item) => sum + item.price * item.quantity, 0);
  const shipping = 15000;
  const tax = subtotal * 0.1;
  const total = subtotal + shipping + tax;

  // Redirect ke halaman pembayaran
  window.location.href = "index pembayaran.html";
}

// Simpan keranjang ke localStorage
function saveCartToStorage() {
  localStorage.setItem("cartItems", JSON.stringify(cartItems));
}

// Muat keranjang dari localStorage
function loadCartFromStorage() {
  const savedCart = localStorage.getItem("cartItems");
  if (savedCart) {
    cartItems = JSON.parse(savedCart);
  }
}

// Tambah produk sample (untuk demo ketika keranjang kosong)
function addSampleItems() {
  cartItems = [
    {
      id: Date.now() + 1,
      name: "3 Diamonds",
      description: "3Dm, ASW Olshop Game",
      price: 700,
      quantity: 1,
      image: "image/ml/topup1.webp",
    },
    {
      id: Date.now() + 2,
      name: "3 Diamonds",
      description: "3Dm, ASW Olshop Game",
      price: 1000,
      quantity: 1,
      image: "image/ml/topup2.webp",
    },
    {
      id: Date.now() + 3,
      name: "Weekly Diamond Pass",
      description: "WDP, ASW Olshop Game",
      price: 27400,
      quantity: 2,
      image: "image/ml/wdp1.webp",
    },
  ];

  renderCartItems();
  updateSummary();
  saveCartToStorage();
}

// Tambah item baru ke keranjang (fungsi untuk integrasi dengan halaman produk)
function addToCart(product) {
  const existingItem = cartItems.find((item) => item.id === product.id);

  if (existingItem) {
    existingItem.quantity += 1;
  } else {
    cartItems.push({
      ...product,
      quantity: 1,
    });
  }

  renderCartItems();
  updateSummary();
  saveCartToStorage();
}

// Hitung total item di keranjang
function getTotalItems() {
  return cartItems.reduce((total, item) => total + item.quantity, 0);
}

// Hitung total harga keranjang
function getTotalPrice() {
  const subtotal = cartItems.reduce((total, item) => total + item.price * item.quantity, 0);
  const shipping = cartItems.length > 0 ? 15000 : 0;
  const tax = subtotal * 0.1;
  return subtotal + shipping + tax;
}

// Kosongkan keranjang
function clearCart() {
  if (cartItems.length === 0) {
    showNotification("Keranjang sudah kosong!")
    return
  }

  if (confirm("Apakah Anda yakin ingin mengosongkan keranjang?")) {
    cartItems = []
    renderCartItems()
    updateSummary()
    saveCartToStorage()
    showNotification("Keranjang berhasil dikosongkan")
  }
}

// Event listener untuk responsive handling
function handleResize() {
  // Tambahan handling untuk mobile jika diperlukan
  if (window.innerWidth <= 768) {
    // Mobile specific adjustments
    console.log("Mobile view activated")
  }
}

// Inisialisasi halaman
document.addEventListener("DOMContentLoaded", () => {
  loadCartFromStorage()
  renderCartItems()
  updateSummary()

  // Update judul halaman dengan jumlah item
  const totalItems = getTotalItems()
  if (totalItems > 0) {
    document.title = `Keranjang Belanja (${totalItems})`
  }
})

// Event listeners
window.addEventListener("resize", handleResize)

// Keyboard shortcuts
document.addEventListener("keydown", (e) => {
  // ESC untuk menutup notifikasi
  if (e.key === "Escape") {
    const notification = document.getElementById("notification")
    notification.classList.remove("show")
  }

  // Ctrl+D untuk clear cart (untuk testing)
  if (e.ctrlKey && e.key === "d") {
    e.preventDefault()
    clearCart()
  }
})

// Export functions untuk penggunaan di file lain (jika diperlukan)
if (typeof module !== "undefined" && module.exports) {
  module.exports = {
    addToCart,
    removeItem,
    updateQuantity,
    getTotalItems,
    getTotalPrice,
    clearCart,
    formatCurrency,
  }
}

document.addEventListener('DOMContentLoaded', function() {
  const navItems = document.querySelectorAll('.bottom-nav-item');
  
  navItems.forEach(item => {
    item.addEventListener('click', function(e) {
      // Jangan preventDefault, biarkan link berjalan
      navItems.forEach(nav => nav.classList.remove('active'));
      this.classList.add('active');
    });
  });
});
