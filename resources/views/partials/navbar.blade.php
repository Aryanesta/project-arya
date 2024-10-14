<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0" />

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ $title === 'Dashboard' ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard">
      <i class="fas fa-fw fa-tachometer-alt" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Nav Item - Produk -->
  <li class="nav-item {{ $title === 'Product' || $title === 'Product Category' ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu1" aria-expanded="{{ $title === 'Product' || $title === 'Product Category' ? 'true' : 'false' }}" aria-controls="submenu1">
      <i class="fas fa-fw fa-box" data-bs-toggle="tooltip" data-bs-placement="right" title="Produk"></i>
      <span>Produk</span>
    </a>
    <div id="submenu1" class="collapse {{ $title === 'Product' || $title === 'Product Category' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <ul class="list-group list-group-flush ms-4">
        <li><a class="nav-link {{ $title === 'Product' ? 'active' : '' }}" href="/admin/product">View Produk</a></li>
        <li><a class="nav-link {{ $title === 'Product Category' ? 'active' : '' }}" href="/admin/product-category">Kategori Produk</a></li>
      </ul>
    </div>
  </li>

  <!-- Nav Item - Transaction -->
  <li class="nav-item {{ $title === 'Transaction' || $title === 'Customer' ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu3" aria-expanded="{{ $title === 'Transaction' || $title === 'Customer' ? 'true' : 'false' }}" aria-controls="submenu3">
      <i class="fas fa-fw fa-box" data-bs-toggle="tooltip" data-bs-placement="right" title="Transaction"></i>
      <span>Transaction</span>
    </a>
    <div id="submenu3" class="collapse {{ $title === 'Transaction' || $title === 'Customer' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <ul class="list-group list-group-flush ms-4">
        <li><a class="nav-link {{ $title === 'Transaction' ? 'active' : '' }}" href="/admin/transaction">Your Transaction</a></li>
        <li><a class="nav-link {{ $title === 'Customer' ? 'active' : '' }}" href="/admin/customer">Customer</a></li>
      </ul>
    </div>
  </li>
  
  <!-- Nav Item - Contact -->
  <li class="nav-item {{ $title === 'Contact' ? 'active' : '' }}">
    <a class="nav-link" href="/contact">
      <i class="fas fa-fw fa-address-book" data-bs-toggle="tooltip" data-bs-placement="right" title="Kontak"></i>
      <span>Kontak</span>
    </a>
  </li>

  <!-- Nav Item - Blog -->
  <li class="nav-item">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu2" aria-expanded="{{ $title === 'Blog' || $title === 'Blog Categories' ? 'true' : 'false' }}" aria-controls="submenu2">
      <i class="fas fa-fw fa-blog" data-bs-toggle="tooltip" data-bs-placement="right" title="Blog"></i>
      <span>Blog</span>
    </a>
    <div id="submenu2" class="collapse {{ $title === 'Blog' || $title === 'Blog Categories' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <ul class="list-group list-group-flush ms-4">
        <li><a class="nav-link {{ $title === 'Blog' ? 'active' : '' }}" href="/blog">View Blogs</a></li>
        <li><a class="nav-link {{ $title === 'Blog Categories' ? 'active' : '' }}" href="/category">Blog Categories</a></li>
      </ul>
    </div>
  </li>
</ul>
<!-- End of Sidebar -->
