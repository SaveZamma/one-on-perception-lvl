function toggleDropdown() {
    var content = document.getElementById('dropdown-content');
    content.style.display = content.style.display === 'none' ? 'block' : 'none';
}
document.addEventListener('click', function(e) {
    if (!e.target.closest('.category-multiselect')) {
        document.getElementById('dropdown-content').style.display = 'none';
    }
});