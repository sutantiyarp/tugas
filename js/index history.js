document.addEventListener('DOMContentLoaded', function() {
    const buyAgainButton = document.querySelector('.buy-again');

    buyAgainButton.addEventListener('click', function() {
        alert('Melakukan pembelian ulang!');
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
