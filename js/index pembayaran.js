document.addEventListener('DOMContentLoaded', function() {
    // Toggle switches functionality
    const toggleSwitches = document.querySelectorAll('.toggle-switch input');
    
    toggleSwitches.forEach(toggle => {
        toggle.addEventListener('change', function() {
            if (this.checked) {
                // If one is checked, uncheck the other
                toggleSwitches.forEach(otherToggle => {
                    if (otherToggle !== this) {
                        otherToggle.checked = false;
                    }
                });
                
                // Update payment details based on selection
                updatePaymentMethod(this.id);
            }
        });
    });
    
    // Atur button functionality
    const aturBtn = document.querySelector('.atur-btn');
    aturBtn.addEventListener('click', function() {
        alert('Fitur pengaturan user ID akan segera tersedia!');
    });
    
    // Ganti button functionality
    const gantiBtn = document.querySelector('.ganti-btn');
    gantiBtn.addEventListener('click', function() {
        showPaymentOptions();
    });
    
    // Bayar button functionality
    const bayarBtn = document.querySelector('.bayar-btn');
    bayarBtn.addEventListener('click', function() {
        processPayment();
    });
    
    // Coupon section click
    const couponSection = document.querySelector('.coupon-section');
    couponSection.addEventListener('click', function() {
        alert('Halaman kupon akan segera tersedia!');
    });
    
    function updatePaymentMethod(selectedMethod) {
        const methodName = selectedMethod === 'dompetku' ? 'Dompetku' : 'itemku Token';
        const paymentMethodSpan = document.querySelector('.detail-row span:last-child');
        paymentMethodSpan.textContent = methodName;
        
        // Update admin fee based on method
        const adminFeeRow = document.querySelectorAll('.detail-row')[3];
        const adminFeeSpan = adminFeeRow.querySelector('span:last-child');
        
        if (selectedMethod === 'dompetku' || selectedMethod === 'itemku-token') {
            adminFeeSpan.textContent = 'Rp0';
            updateTotal();
        }
    }
    
    function updateTotal() {
        const totalPesanan = 700;
        const layananPremium = 5000;
        const biayaAdmin = 0; // Updated when using digital wallet
        const total = totalPesanan + layananPremium + biayaAdmin;
        
        const totalSpan = document.querySelector('.total-row strong:last-child');
        totalSpan.textContent = `Rp${total.toLocaleString('id-ID')}`;
    }
    
    function showPaymentOptions() {
        const paymentMethods = [
            'Bank BRI - Rp4.000',
            'Bank BCA - Rp3.500',
            'Bank Mandiri - Rp4.000',
            'GoPay - Rp0',
            'OVO - Rp0',
            'DANA - Rp0'
        ];
        
        let options = 'Pilih metode pembayaran:\n\n';
        paymentMethods.forEach((method, index) => {
            options += `${index + 1}. ${method}\n`;
        });
        
        const choice = prompt(options + '\nMasukkan nomor pilihan (1-6):');
        
        if (choice && choice >= 1 && choice <= 6) {
            const selectedMethod = paymentMethods[choice - 1];
            alert(`Metode pembayaran berhasil diubah ke: ${selectedMethod}`);
            
            // Update UI based on selection
            const bankDetails = document.querySelector('.bank-details');
            const methodName = selectedMethod.split(' - ')[0];
            const fee = selectedMethod.split(' - ')[1];
            
            bankDetails.querySelector('strong').textContent = methodName;
            bankDetails.querySelector('p').textContent = `Biaya: ${fee}`;
            
            // Update payment details
            const paymentMethodSpan = document.querySelector('.detail-row span:last-child');
            paymentMethodSpan.textContent = methodName;
            
            const adminFeeSpan = document.querySelectorAll('.detail-row')[3].querySelector('span:last-child');
            adminFeeSpan.textContent = fee;
            
            // Recalculate total
            const feeAmount = parseInt(fee.replace(/[^\d]/g, ''));
            const newTotal = 700 + 5000 + feeAmount;
            const totalSpan = document.querySelector('.total-row strong:last-child');
            totalSpan.textContent = `Rp${newTotal.toLocaleString('id-ID')}`;
        }
    }
    
    function processPayment() {
        const paymentMethod = document.querySelector('.detail-row span:last-child').textContent;
        const totalAmount = document.querySelector('.total-row strong:last-child').textContent;
        
        // Show loading state
        const bayarBtn = document.querySelector('.bayar-btn');
        const originalText = bayarBtn.textContent;
        bayarBtn.textContent = 'Memproses...';
        bayarBtn.disabled = true;
        
        // Simulate payment processing
        setTimeout(() => {
            alert(`Pembayaran sebesar ${totalAmount} menggunakan ${paymentMethod} sedang diproses.\n\nAnda akan diarahkan ke halaman konfirmasi pembayaran.`);
            
            // Reset button
            bayarBtn.textContent = originalText;
            bayarBtn.disabled = false;
        }, 2000);
    }
    
    // Add some interactive animations
    const paymentOptions = document.querySelectorAll('.payment-option');
    paymentOptions.forEach(option => {
        option.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
            this.style.transition = 'transform 0.2s ease';
        });
        
        option.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
    
    // Add click animation to buttons
    const buttons = document.querySelectorAll('button');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });
});