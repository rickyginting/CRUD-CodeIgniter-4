function imgMhs() {
    const gambarLabel = document.querySelector('.form-file-text');
    gambarLabel.textContent = photo_mhs.files[0].name;
}

function imgDosen() {
    const gambarLabel = document.querySelector('.form-file-text');
    gambarLabel.textContent = photo_dosen.files[0].name;
}