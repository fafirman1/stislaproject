@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{route('login')}}" class="needs-validation" novalidate="">
                @csrf

                {{-- email --}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email"
                        type="email"
                        class="form-control
                        @error('email')
                        is-invalid
                        @enderror"
                        name="email"
                        tabindex="1"
                        autofocus>
                    @error ('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <div class="d-block">
                        <label for="password"
                            class="control-label">Password
                        </label>
                    <!--
                        <div class="float-right">
                            <a href="auth-forgot-password.html"
                                class="text-small">
                                Forgot Password?
                            </a>
                        </div>
                    -->
                    </div>
                    <input id="password"
                        type="password"
                        class="form-control
                        @error('password')
                        is-invalid
                        @enderror"
                        name="password"
                        tabindex="2">
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                {{-- Roles --}}
                {{-- <div class="form-group">
                    <label for="roles">Roles</label>
                    <input id="roles"
                        type="text"
                        class="form-control
                        @error('roles')
                        is-invalid
                        @enderror"
                        name="roles"
                        tabindex="3"
                        autofocus>
                    @error ('roles')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div> --}}

                {{-- <div class="form-group">
                    <label for="roles">Roles</label>
                    <select id="roles" class="form-control @error('roles') is-invalid @enderror" name="roles" tabindex="3">
                        <option value="ADMIN">Admin</option>
                        <option value="KASIR">Kasir</option>
                        <!-- Add other role options here -->
                    </select>
                    @error('roles')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}


                {{-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                            name="remember"
                            class="custom-control-input"
                            tabindex="3"
                            id="remember-me">
                        <label class="custom-control-label"
                            for="remember-me">Remember Me</label>
                    </div>
                </div> --}}

                {{-- Button --}}

                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block"
                        tabindex="4">
                        Login
                    </button>
                </div>
            </form>
        <!--
            <div class="mt-4 mb-3 text-center">
                <div class="text-job text-muted">Login With Social</div>
            </div>
            <div class="row sm-gutters">
                <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                        <span class="fab fa-facebook"></span> Facebook
                    </a>
                </div>
                <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                        <span class="fab fa-twitter"></span> Twitter
                    </a>
                </div>
            </div>
        -->

        </div>
    </div>
<!--
    <div class="text-muted mt-5 text-center">
        Don't have an account? <a href="{{route('register')}}">Create One</a>
    </div>
-->
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
