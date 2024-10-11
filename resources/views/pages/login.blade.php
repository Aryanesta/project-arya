@extends('layout.auth')

@section('container')

<section class="container d-flex justify-content-center align-items-center flex-column" style="height: 100vh">
    <h1>Sign In</h1>
    
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <form action="/" method="POST" class="border w-50 auth">
        @csrf
        
        <!-- Input untuk Email -->
        <div class="mb-3 mt-3">
            <x-input 
                inputType="email" 
                inputName="email" 
                inputClass="form-control @error('email') is-invalid @enderror" 
                placeholder="email" 
                label="Email"
                required 
            />
        </div>

        <!-- Input untuk Password -->
        <div class="mb-3 mt-3">
            <x-input 
                inputType="password" 
                inputName="password" 
                inputClass="form-control @error('password') is-invalid @enderror" 
                placeholder="Password" 
                label="Password" 
                required 
            />
        </div>

        <p>Click here for <a href="/registration">Sign Up</a></p>

        <!-- Tombol Login -->
        <x-button 
            className="btn submit-btn btn-primary" 
            buttonType="submit" 
            label="Login" 
        />
    </form>
</section>

@endsection
