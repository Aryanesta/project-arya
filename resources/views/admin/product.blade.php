@extends('layout.app')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Galleries</h1>
  
    <!-- Carousel -->
    <div id="produk" class="carousel slide container w-75" data-bs-ride="carousel">
      <!-- Slideshow/Carousel -->
      <div class="carousel-inner" id="gambar">
        <div class="carousel-item active">
          <img src="/upload/product-1.png" alt="Produk 1" class="d-block w-100 rounded" />
        </div>
      </div>
  
      <!-- Button kanan/kiri -->
      <button class="carousel-control-prev" type="button" data-bs-target="#produk" data-bs-slide="prev" style="border: none; background-color: transparent;">
        <span class="carousel-control-prev-icon bg-primary p-3 rounded"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#produk" data-bs-slide="next" style="border: none; background-color: transparent;">
        <span class="carousel-control-next-icon bg-primary p-3 rounded"></span>
      </button>
    </div>
  
    <h1 class="h3 text-gray-800 mt-5">Galleries Indicator</h1>
  
    <!-- Image Gallery (Carousel Indicators) -->
    <div class="container p-2 carousel-indicator border-primary" style="border: 5px solid; border-radius: 10px;">
      <div class="row d-flex justify-content-center image-gallery" id="gallery">
        <div class="col-md-4 col-6 col-xl-3 my-1 gallery-indicator" data-bs-target="#produk" data-bs-slide-to="0">
          <img src="/upload/product-1.png" alt="Produk 1" class="border rounded img-fluid img-gallery" style="cursor: pointer;">
        </div>
      </div>
    </div>
  
    <div style="height: 100px"></div>
  
    <!-- End of Main Content -->
  
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; Your Website 2020</span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->
</div>
  <!-- End of Content Wrapper -->
  
  <!-- End of Page Wrapper -->
@endsection
