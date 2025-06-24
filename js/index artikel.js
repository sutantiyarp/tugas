// Menambahkan tanggal akhir promo
const endDate = new Date('2025-06-30');
const dateString = endDate.toLocaleDateString('id-ID');
document.getElementById('end-date').textContent = `Promo berakhir pada: ${dateString}`;

// Menambahkan fungsionalitas tombol klaim diskon
document.getElementById('claim-promo').addEventListener('click', function() {
    alert('Diskon berhasil diklaim! Terima kasih telah berbelanja di website kami.');
});
