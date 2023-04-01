@extends('layouts.main')
@section('title', 'V Login | Page')
@section('content')

    <div class="w-50 border rounded center px-5 py-3 mx-auto">
        <h1>
            <center> Login Here</center>
        </h1>
        <div class="images-center">
            <img src="https://media.istockphoto.com/id/1312423107/vector/stealing-data-concept-flat-vector-illustration-online-registration-form-login-to-social.jpg?s=612x612&w=0&k=20&c=7Trftif8xV9FCDO5B4M7JiBpZUFlXo51m5lfI6hYCog="
                class="img-fluid" alt="Sample image">
        </div>
        <form action="/auth/login" method="POST">
            @csrf
            <!-- Email input -->
            <div class="mb-3">
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" name="email" value="{{ Session::get('email') }}" />
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Password input -->
            <div class="mb-3">
                <input type="password" id="email" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password" name="password" />
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Button --}}
            <div class="text-center text-lg-start pt-2 btn-sm d-grid">
                <button type="submit" class="btn btn-primary "
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!" class="link-primary">Register</a>
                </p>
            </div>
        </form>
        @include('sweetalert::alert')
    </div>
@endsection
