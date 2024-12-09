document.addEventListener('DOMContentLoaded', () => {
    const changePhotoLink = document.getElementById('changePhotoLink');
    const photoInput = document.getElementById('photoInput');

    // Event listener untuk elemen <a>
    changePhotoLink.addEventListener('click', (event) => {
        event.preventDefault(); // Mencegah tautan melakukan navigasi
        photoInput.click(); // Membuka dialog unggah file
    });

    // Event listener untuk input file
    photoInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            // Menampilkan preview gambar baru
            const reader = new FileReader();
            reader.onload = (e) => {
                document.querySelector('img').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});
