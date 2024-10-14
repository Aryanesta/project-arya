@extends('layout.app')

@section('container')
<div class="container">
  <h1 style="margin: auto" class="mb-3">Product</h1>

  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">Add Product</button>

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="row justify-content-start my-3">
    @foreach ($products as $product)        
    <div class="card col-xl-4 col-lg-6 col-sm-6 mb-3" style="width: 18rem;">
        <img src="../upload/{{ $product->image }}" class="card-img-top" alt="{{ $product->image }}">
        <div class="card-body">
            <h5 class="card-title" style="font-weight: bolder">{{ $product->name }}</h5>
            <h6 class="card-text text-success">Price : ${{ $product->price }}</h6>
            <p class="card-text">{{ $product->description }}</p>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProduct{{ $product->id }}"><i class="bi bi-pencil-square"></i></button>
            <form method="POST" action="/admin/product/{{ $product->id }}" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle"></i></button>
              <p class="card-text mt-3"><small class="text-muted">Last updated {{ $product->updated_at->diffForHumans() }}</small></p>
            </form>
        </div>
    </div>

    <!-- UPDATE PRODUKK -->
    <div class="modal fade" id="editProduct{{ $product->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Item</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/admin/product/{{ $product->id }}/edit">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" inputmode="numeric" value="{{ old('price', $product->price) }}">
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Product Image</label>
                            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Product Desc</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Product Category</label>
                            <select name="product_category_id" id="category" class="form-select">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ old('product_category_id', $product->product_category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

  <!-- Tambah PRODUKK -->
  <div class="modal fade" id="addProduct">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Add New Item</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <form method="POST" action="/admin/product">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Product Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" inputmode="numeric" value="{{ old('price') }}">
              @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Product Image</label>
              <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
              @error('image')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Product Desc</label>
              <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
              <label for="category">Product Category</label>
              <select class="form-control" id="category" name="product_category_id">
                  @foreach($categories as $category)
                      <option value="{{ $category->id }}" {{ old('product_category_id') == $category->id ? 'selected' : '' }}>
                          {{ $category->category_name }}
                      </option>
                  @endforeach
              </select>
              @error('product_category_id')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
