// Banner section
let currentIndex = 0;
const banners = document.querySelectorAll('.banner-image');
const indicators = document.querySelectorAll('.indicator');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');

function updateBanner() {
    const offset = -currentIndex * 100; // Move to the next image
    document.querySelector('.banner-images').style.transform = `translateX(${offset}%)`;

    // Update indicators
    indicators.forEach((indicator, index) => {
        if (index === currentIndex) {
            indicator.classList.add('active');
        } else {
            indicator.classList.remove('active');
        }
    });
}

prevBtn.addEventListener('click', () => {
    currentIndex = (currentIndex === 0) ? banners.length - 1 : currentIndex - 1;
    updateBanner();
});

nextBtn.addEventListener('click', () => {
    currentIndex = (currentIndex === banners.length - 1) ? 0 : currentIndex + 1;
    updateBanner();
});

indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
        currentIndex = index;
        updateBanner();
    });
});

// Automatically move the banner every 3 seconds (3000ms)
setInterval(() => {
    currentIndex = (currentIndex + 1) % banners.length;  // Move to the next image
    updateBanner();
}, 5000);  // 3 seconds interval

// Initialize the first banner
updateBanner();

// Banner click functionality (without changing appearance)
const bannerImages = document.querySelectorAll('.banner-image');

bannerImages.forEach(image => {
    image.addEventListener('click', () => {
        const href = image.getAttribute('data-href'); // Get the link from data-href attribute
        if (href) {
            window.location.href = href; // Redirect to the URL specified in data-href
        }
    });
});

// Get elements Terbaru Section
document.addEventListener("DOMContentLoaded", function() {
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    const loadLessBtn = document.getElementById('loadLessBtn');
    const terbaruContainer = document.getElementById('terbaruContainer');
    
    // Definisikan jumlah item yang akan ditampilkan
    let itemCount = 12; // Item pertama yang ditampilkan
    const totalItems = 24; // Misalnya, Anda memiliki 24 item total

    // Menyembunyikan item setelah 12 pertama
    function displayItems() {
        const items = terbaruContainer.querySelectorAll('.terbaru-item');
        
        items.forEach((item, index) => {
            if (index < itemCount) {
                item.style.display = 'block'; // Menampilkan item
            } else {
                item.style.display = 'none'; // Menyembunyikan item yang belum ditampilkan
            }
        });
    }

    // Fungsi untuk menambah item saat tombol "Tampilkan Lebih Banyak" ditekan
    loadMoreBtn.addEventListener('click', () => {
        itemCount += 12; // Menambah jumlah item yang ditampilkan
        
        // Update tampilan item setelah tombol ditekan
        displayItems();

        // Setelah menampilkan semua item, sembunyikan tombol "Tampilkan Lebih Banyak" dan tampilkan "Tampilkan Lebih Sedikit"
        if (itemCount >= totalItems) {
            loadMoreBtn.style.display = 'none'; // Sembunyikan tombol "Tampilkan Lebih Banyak"
            loadLessBtn.style.display = 'block'; // Tampilkan tombol "Tampilkan Lebih Sedikit"
        }
    });

    // Fungsi untuk menyembunyikan item saat tombol "Tampilkan Lebih Sedikit" ditekan
    loadLessBtn.addEventListener('click', () => {
        itemCount = 12; // Reset jumlah item yang ditampilkan ke 12
        
        // Update tampilan item setelah tombol ditekan
        displayItems();

        // Setelah mengembalikan ke 12 item, sembunyikan tombol "Tampilkan Lebih Sedikit" dan tampilkan "Tampilkan Lebih Banyak"
        loadMoreBtn.style.display = 'block'; // Tampilkan tombol "Tampilkan Lebih Banyak"
        loadLessBtn.style.display = 'none'; // Sembunyikan tombol "Tampilkan Lebih Sedikit"
    });

    // Inisialisasi tampilan item pertama
    displayItems();
});

//tipe content
const tipeContent = document.querySelector('.tipe-content');

window.addEventListener('scroll', () => {
    // Mengecek apakah halaman sudah digulir lebih dari 80px
    if (window.scrollY >= 550) {
        tipeContent.classList.add('white');  // Tambahkan kelas saat scroll
    } else {
        tipeContent.classList.remove('white');  // Hapus kelas saat scroll kembali ke atas
    }
});


// Tipe Nav
document.addEventListener("DOMContentLoaded", function() {
// Tipe Nav untuk Deteksi Scroll pada Pulsa, Populer, dan Terbaru
const populerNavBtn = document.getElementById('populerNavBtn');
const terbaruNavBtn = document.getElementById('terbaruNavBtn');
const pulsaNavBtn = document.getElementById('pulsaNavBtn');
const populerSection = document.querySelector('.populer-section');
const terbaruSection = document.querySelector('.terbaru-section');
const pulsaSection = document.querySelector('.pulsa-section');

function activateButton(activeBtn, inactiveBtns) {
    activeBtn.classList.add('active');
    inactiveBtns.forEach((btn) => {
        btn.classList.remove('active');
    });
}

function detectSection() {
    const populerOffset = populerSection.getBoundingClientRect();
    const terbaruOffset = terbaruSection.getBoundingClientRect();
    const pulsaOffset = pulsaSection.getBoundingClientRect();

    // Deteksi apakah Populer Section sudah masuk viewport
    if (populerOffset.top <= 70 && populerOffset.bottom >= 70) {
        activateButton(populerNavBtn, [terbaruNavBtn, pulsaNavBtn]);
    }
    // Deteksi apakah Terbaru Section sudah masuk viewport
    else if (terbaruOffset.top <= 70 && terbaruOffset.bottom >= 70) {
        activateButton(terbaruNavBtn, [populerNavBtn, pulsaNavBtn]);
    }
    // Deteksi apakah Pulsa Section sudah masuk viewport
    else if (pulsaOffset.top <= 70 && pulsaOffset.bottom >= 0) {
        activateButton(pulsaNavBtn, [populerNavBtn, terbaruNavBtn]);
    } else {
        // Jika tidak ada section yang aktif, kembali ke kondisi default
        populerNavBtn.classList.remove('active');
        terbaruNavBtn.classList.remove('active');
        pulsaNavBtn.classList.remove('active');
    }
}

// info section
window.addEventListener('scroll', detectSection);
});

document.addEventListener('DOMContentLoaded', () => {
    const infoBtns = document.querySelectorAll('.info-btn');

    infoBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const parentItem = btn.closest('.info-item');
            const content = parentItem.querySelector('.info-content');
            
            parentItem.classList.toggle('active');
            content.style.display = parentItem.classList.contains('active') ? 'block' : 'none';
        });
    });
});

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
