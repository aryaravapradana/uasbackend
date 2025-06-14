document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('.kategori-toggle');
    const dropdown = document.querySelector('.kategori-dropdown');

    if (toggle && dropdown) {
        toggle.addEventListener('click', function () {
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        });

        // Tutup saat klik di luar
        document.addEventListener('click', function (e) {
            if (!toggle.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });
    }
});
