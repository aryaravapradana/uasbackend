document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.querySelector('.kategori-toggle');
    const dropdown = document.querySelector('.kategori-dropdown');
    let isOpen = false;

    if (toggle && dropdown) {
        toggle.addEventListener('click', () => {
            isOpen = !isOpen;
            dropdown.style.display = isOpen ? 'block' : 'none';
        });

        document.addEventListener('click', function (e) {
            if (!e.target.closest('.kategori-dropdown-wrapper')) {
                dropdown.style.display = 'none';
                isOpen = false;
            }
        });
    }
});
