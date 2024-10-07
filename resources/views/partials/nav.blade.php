<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0" />

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ $title === 'Dashboard' ? 'active' : '' }}">
    <a class="nav-link" href="/">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Nav Item - Produk -->
  <li class="nav-item {{ $title === 'Product' ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu1" aria-expanded="false" aria-controls="submenu1">
      <i class="fas fa-fw fa-box"></i>
      <span>Produk</span>
    </a>
    <div id="submenu1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <ul class="list-unstyled ms-4">
        <li><a class="nav-link" href="/admin/product">View Produk</a></li>
        <li><a class="nav-link" href="/admin/add-product">Add Produk</a></li>
      </ul>
    </div>
  </li>

  <!-- Nav Item - Contact -->
  <li class="nav-item {{ $title === 'Contact' ? 'active' : '' }}">
    <a class="nav-link" href="/admin/contact">
      <i class="fas fa-fw fa-address-book"></i>
      <span>Kontak</span>
    </a>
  </li>

  <!-- Nav Item - Blog -->
  <li class="nav-item {{ $title === 'Blog' ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu2" aria-expanded="false" aria-controls="submenu2">
      <i class="fas fa-fw fa-blog"></i>
      <span>Blog</span>
    </a>
    <div id="submenu2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <ul class="list-unstyled ms-4">
        <li><a class="nav-link" href="/blog">View Blogs</a></li>
        <li><a class="nav-link" href="/category">Blog Categories</a></li>
      </ul>
    </div>
  </li>
</ul>
<!-- End of Sidebar -->
