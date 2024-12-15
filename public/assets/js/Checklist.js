document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const editForm = document.getElementById('editForm');
    const deleteForm = document.getElementById('deleteForm');

    // Tombol Edit
    const editButton = document.querySelector('#editButton');
    editButton.addEventListener('click', () => {
        const checked = [...checkboxes].filter(cb => cb.checked);
        if (checked.length !== 1) {
            alert('Pilih hanya satu item untuk di-edit.');
            return;
        }
        document.getElementById('editId').value = checked[0].value;
        editForm.submit();
    });

    // Tombol Hapus
    const deleteButton = document.querySelector('#deleteButton');
    deleteButton.addEventListener('click', () => {
        const checked = [...checkboxes].filter(cb => cb.checked);
        if (checked.length === 0) {
            alert('Pilih setidaknya satu item untuk dihapus.');
            return;
        }
        document.getElementById('deleteIds').value = checked.map(cb => cb.value).join(',');
        deleteForm.submit();
    });
});
