function previewImage() {
    const image = document.querySelector('#gmb');
    const imgPreview = document.querySelector('#img-preview');

    if (image.files.length > 0 && image.files[0]) {
    // User memilih file gambar
    const blob = URL.createObjectURL(image.files[0]);
    imgPreview.src = blob;
    } else {
    // User tidak memilih file gambar
    imgPreview.src = '/image/shoes.png'; // Mengganti gambar dengan placeholder
    }
}


function previewImage2() {
    const image = document.querySelector('#gmb2');
    const imgPreview = document.querySelector('#img-preview2');

    if (image.files.length > 0 && image.files[0]) {
    // User memilih file gambar
    const blob = URL.createObjectURL(image.files[0]);
    imgPreview.src = blob;
    } else {
    // User tidak memilih file gambar
    imgPreview.src = '/image/shoes.png'; // Mengganti gambar dengan placeholder
    }
}

function previewImage3() {
    const image = document.querySelector('#gmb3');
    const imgPreview = document.querySelector('#img-preview3');

    if (image.files.length > 0 && image.files[0]) {
    // User memilih file gambar
    const blob = URL.createObjectURL(image.files[0]);
    imgPreview.src = blob;
    } else {
    // User tidak memilih file gambar
    imgPreview.src = '/image/shoes.png'; // Mengganti gambar dengan placeholder
    }
}

function previewImage4() {
    const image = document.querySelector('#gmb4');
    const imgPreview = document.querySelector('#img-preview4');

    if (image.files.length > 0 && image.files[0]) {
    // User memilih file gambar
    const blob = URL.createObjectURL(image.files[0]);
    imgPreview.src = blob;
    } else {
    // User tidak memilih file gambar
    imgPreview.src = '/image/shoes.png'; // Mengganti gambar dengan placeholder
    }
}


