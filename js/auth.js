function showLogin(event) {
    // Update toggle buttons
    document.querySelectorAll('.toggle-btn').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    // Show login form
    document.getElementById('loginForm').classList.add('active');
    document.getElementById('registerForm').classList.remove('active');
}

function showRegister(event) {
    // Update toggle buttons
    document.querySelectorAll('.toggle-btn').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    // Show register form
    document.getElementById('registerForm').classList.add('active');
    document.getElementById('loginForm').classList.remove('active');
}

function handleLogin(event) {
    event.preventDefault();
    
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    
    // Simulasi login
    if (email && password) {
        // Jika login sukses, arahkan ke halaman index masuk.html
        window.location.href = 'index masuk.html';
    } else {
        alert('Email dan password harus diisi!');
    }
}

function handleRegister(event) {
    event.preventDefault();
    
    const name = document.getElementById('registerName').value;
    const email = document.getElementById('registerEmail').value;
    const password = document.getElementById('registerPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    // Validasi password
    if (password !== confirmPassword) {
        alert('Password dan konfirmasi password tidak sama!');
        return;
    }
    
    if (password.length < 6) {
        alert('Password minimal 6 karakter!');
        return;
    }
    
    // Simulasi register
    if (name && email && password) {
        alert(`Registrasi berhasil!\nNama: ${name}\nEmail: ${email}`);
        // Di sini Anda bisa menambahkan logika untuk mengirim data ke server
        
        // Pindah ke form login setelah registrasi berhasil
        showLogin(event);
        document.querySelectorAll('.toggle-btn')[0].classList.add('active');
        document.querySelectorAll('.toggle-btn')[1].classList.remove('active');
    }
}

// Tambahkan event listener untuk responsive behavior
window.addEventListener('resize', function() {
    // Pastikan form tetap terlihat baik saat orientasi berubah
    const container = document.querySelector('.container');
    if (window.innerHeight < 600) {
        container.style.minHeight = 'auto';
    } else {
        container.style.minHeight = '500px';
    }
});
