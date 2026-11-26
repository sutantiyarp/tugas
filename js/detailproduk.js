document.addEventListener("DOMContentLoaded", function() {
    // Ambil referensi ke elemen yang diperlukan
    const decreaseButton = document.querySelector('.decrease');
    const increaseButton = document.querySelector('.increase');
    const quantityInput = document.querySelector('.quantity');
    const totalPrice = document.querySelector('.total-price');
    const pricePerUnit = 900;  // Harga per unit produk

    // Fungsi untuk mengurangi jumlah
    decreaseButton.addEventListener('click', function() {
        let currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity > 1) {
            currentQuantity--;
            quantityInput.value = currentQuantity;
            updateTotalPrice(currentQuantity);
        }
    });

    // Fungsi untuk menambah jumlah
    increaseButton.addEventListener('click', function() {
        let currentQuantity = parseInt(quantityInput.value);
        currentQuantity++;
        quantityInput.value = currentQuantity;
        updateTotalPrice(currentQuantity);
    });

    // Fungsi untuk memperbarui harga total
    function updateTotalPrice(quantity) {
        const total = pricePerUnit * quantity;
        totalPrice.textContent = `Rp${total.toLocaleString()}`;
    }
});
