let imgCount = 2;
for (i = 0; i < 11; i++) {
  const imgElStatic = `<div class="carousel-item">
    <img src="../upload/product-${imgCount}.png" alt="Gambar buah" class="d-block w-100 rounded">
  </div>`;
  const imgGallery = `<div class="col-md-4 col-6 col-xl-3 my-1 gallery-indicator" data-bs-target="#produk" data-bs-slide-to="${
    i + 1
  }">
                        <img src="../upload/product-${imgCount}.png" alt="" class="border rounded img-gallery" style="cursor: pointer;">
                      </div>`;
  $('#gambar').append(imgElStatic);
  $('#gallery').append(imgGallery);
  imgCount++;
}

$.ajax({
  url: 'https://dummyjson.com/image/400x200/282828?fontFamily=pacifico&text=I+am+a+pacifico+font',
  method: 'GET',
  xhrFields: {
    responseType: 'blob',
  },
  success: function (response) {
    const src = URL.createObjectURL(response);
    const imgEl = `<div class="carousel-item">
                      <img src="${src}" alt="Gambar API" style="height: 100%;" class="rounded">
                    </div>`;
    const imgGallery = `<div class="col-md-4 col-6 col-xl-3 my-1 gallery-indicator" data-bs-target="#produk" data-bs-slide-to="${12}">
                      <img src="${src}" alt="" class="border rounded img-gallery" style="cursor: pointer;">
                    </div>`;
    $('#gambar').append(imgEl);
    $('#gallery').append(imgGallery);
  },
  error: function (error) {
    console.log(error);
  },
});
