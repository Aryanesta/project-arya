@extends('layout.app')

@section('container')
<div class="container">
    <h1 style="margin: auto" class="mb-3">Customer</h1>
  
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomer">New Customer</button>
  
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
  
    <div class="justify-content-start my-3">
      <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered align-middle">
              <thead>
                  <tr>
                      <th scope="col">No</th>
                      <th scope="col">Image</th>
                      <th scope="col">Name</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($customers as $customer)
                  <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td><img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="Cust Img" width="50px"></td>
                      <td>{{ $customer->name }}</td>
                      <td>{{ $customer->gender }}</td>
                      <td>{{ $customer->email }}</td>
                      <td>{{ $customer->phone_number }}</td>
                      <td>
                          <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editCustomer{{ $customer->id }}"><i class="bi bi-pencil-square"></i></button>
                          <form method="POST" action="/admin/customer/{{ $customer->id }}" class="d-inline">
                              @method('delete')
                              @csrf
                              <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle"></i></button>
                          </form>
                      </td>
                  </tr>
  
                  <!-- Update Modal for Each Customer -->
                  <div class="modal fade" id="editCustomer{{ $customer->id }}" tabindex="-1" aria-labelledby="editCustomerLabel{{ $customer->id }}" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">Update Customer</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body">
                                  <form method="POST" action="/admin/customer/{{ $customer->id }}/edit" enctype="multipart/form-data">
                                      @method('PUT')
                                      @csrf
                                      <div class="mb-3">
                                          <label for="name{{ $customer->id }}" class="form-label">Customer Name</label>
                                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name{{ $customer->id }}" name="name" value="{{ old('name', $customer->name) }}">
                                          @error('name')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                      </div>
                                      <div class="mb-3">
                                          <label for="gender{{ $customer->id }}">Gender</label>
                                          <select class="form-control" id="gender{{ $customer->id }}" name="gender">
                                              <option value="male" {{ old('gender', $customer->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                              <option value="female" {{ old('gender', $customer->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                          </select>
                                          @error('gender')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                      </div>
                                      <div class="mb-3">
                                          <label for="email{{ $customer->id }}" class="form-label">Customer Email</label>
                                          <input type="email" id="email{{ $customer->id }}" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $customer->email) }}">
                                          @error('email')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                      </div>
                                      <div class="mb-3">
                                          <label for="phone{{ $customer->id }}" class="form-label">Customer Phone Number</label>
                                          <input type="text" id="phone{{ $customer->id }}" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number', $customer->phone_number) }}">
                                          @error('phone_number')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                      </div>
                                      <div class="mb-3">
                                          <label for="address{{ $customer->id }}" class="form-label">Customer Address</label>
                                          <input type="text" id="address{{ $customer->id }}" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $customer->address) }}">
                                          @error('address')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                      </div>
                                      <div class="mb-3">
                                          <label for="image{{ $customer->id }}" class="form-label">Customer Picture Profile</label>
                                          <input type="file" id="image{{ $customer->id }}" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $customer->image) }}">
                                          @error('image')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                      </div>
                                      <button type="submit" class="btn btn-primary">Update</button>
                                  </form>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  

    <!-- Tambah Pelanggan -->
    <div class="modal fade" id="addCustomer">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
    
            <div class="modal-header">
              <h4 class="modal-title">Add New Customer</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
    
            <div class="modal-body">
              <form method="POST" action="/admin/customer">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Customer Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                  @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Customer Email</label>
                  <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                  @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Customer Phone Number</label>
                    <input type="text" id="phone" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}">
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="address" class="form-label">Customer Address</label>
                  <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                  @error('address')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Customer Picture Profile</label>
                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add New</button>
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