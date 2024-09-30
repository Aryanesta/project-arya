const namaDepan = document.getElementById('nama-depan');
const namaBelakang = document.getElementById('nama-belakang');
const email = document.getElementById('email');
const submitBtn = document.getElementsByClassName('submit-btn')[0];
const modal = new bootstrap.Modal(document.getElementById('myModal'));

submitBtn.addEventListener('click', function (e) {
  if (namaDepan.value === '' || namaBelakang.value === '' || email.value === '') {
    modal.show();
    e.preventDefault();
  } else {
    modal.hide();
  }
});
