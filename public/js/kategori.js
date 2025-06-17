document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('.kategori-toggle');
    const dropdown = document.querySelector('.kategori-dropdown');

    let visible = false;

    function showDropdown() {
        dropdown.style.display = 'block';
        setTimeout(() => {
            dropdown.style.opacity = '1';
        }, 10);
        visible = true;
    }

    function hideDropdown() {
        dropdown.style.opacity = '0';
        setTimeout(() => {
            dropdown.style.display = 'none';
        }, 200);
        visible = false;
    }

    toggle.addEventListener('click', function (e) {
        e.stopPropagation();
        visible ? hideDropdown() : showDropdown();
    });

    document.addEventListener('click', function (e) {
        if (!dropdown.contains(e.target) && !toggle.contains(e.target)) {
            if (visible) hideDropdown();
        }
    });
});
