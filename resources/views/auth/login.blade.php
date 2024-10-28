@extends('layout.auth')

@section('container')
    <div class="container">
        <div class="d-flex flex-column align-items-center my-5">
            <h1>Sign In</h1>

            {{-- Alert --}}
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

            <form action="{{ route('login') }}" method="POST" class="border w-50 auth">
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
        
                <p>Click here for <a href="{{ route('register') }}">Sign Up</a></p>
        
                <!-- Tombol Login -->
                <x-button 
                    className="btn submit-btn btn-primary" 
                    buttonType="submit" 
                    label="Login" 
                />
            </form>
    </div>
</div>
@endsection
