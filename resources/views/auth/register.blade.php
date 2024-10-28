@extends('layout.auth')

@section('container')
<div class="container">
    <div class="row flex-column align-items-center my-5">
        <h1>Sign Up</h1>
        <form action="{{ route('register') }}" method="POST" class="border w-50 auth">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                placeholder="name"
                name="name"
                value="{{ old('name') }}"
                required
                />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="username" class="form-label">Username:</label>
                <input
                type="text"
                class="form-control @error('username') is-invalid @enderror"
                id="username"
                placeholder="Username"
                name="username"
                value="{{ old('username') }}"
                required
                />
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                placeholder="example@mail.com"
                name="email"
                value="{{ old('email') }}"
                required
                />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="mb-3 mt-3">
                <label for="nama-belakang" class="form-label">Password:</label>
                <input
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                placeholder="Password"
                name="password"
                required
                />
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3 mt-3">
                <label for="nama-belakang" class="form-label">Password Confirmation:</label>
                <input
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                placeholder="Password Confirmation"
                name="password_confirmation"
                required
                />
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <p>Have Account? <a href="/">Sign In!</a></p>
        
            <!-- Submit and Reset buttons -->
            <button
                type="submit"
                class="btn submit-btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#myModal"
            >
                Submit
            </button>
        </form>
    </div>
</div>
@endsection
