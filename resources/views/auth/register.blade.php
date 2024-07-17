@extends('layouts.frontend.login')
@section('content')
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100"
        style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header">
                            <h4 class="font-weight-bolder">{{ __('Register') }}</h4>
                            <p class="mb-0">Masukan Data Diri</p>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group input-group-outline mb-2">
                                            <label>{{ __('Nama Lengkap') }}</label>
                                            <div class="input-group">
                                                <input id="fullname" type="text"
                                                    class="form-control @error('fullname') is-invalid @enderror"
                                                    name="fullname" value="{{ old('fullname') }}" required
                                                    autocomplete="fullname" autofocus>
                                                @error('fullname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group input-group-outline mb-2">
                                            <label>{{ __('Username') }}</label>
                                            <div class="input-group">
                                                <input id="username" type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    name="username" value="{{ old('username') }}" required
                                                    autocomplete="username" autofocus>
                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group input-group-outline mb-2">
                                            <label>{{ __('Alamat') }}</label>
                                            <div class="input-group">
                                                <input id="alamat" type="text"
                                                    class="form-control @error('alamat') is-invalid @enderror"
                                                    name="alamat" value="{{ old('alamat') }}" required
                                                    autocomplete="alamat" autofocus>
                                                @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group input-group-outline mb-2">
                                            <label>{{ __('Nomor Telepon') }}</label>
                                            <div class="input-group">
                                                <input id="no_telepon" type="number"
                                                    class="form-control @error('no_telepon') is-invalid @enderror"
                                                    name="no_telepon" value="{{ old('no_telepon') }}" required
                                                    autocomplete="no_telepon" autofocus>
                                                @error('no_telepon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group input-group-outline mb-2">
                                    <label>{{ __('Email') }}</label>
                                    <div class="input-group">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group input-group-outline mb-2">
                                    <label>{{ __('Jenis Kelamin') }}</label>
                                    <div class="input-group">
                                        <select name="jenis_kelamin" id=""
                                            class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group input-group-outline mb-2">
                                    <label>{{ __('Password') }}</label>
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            value="{{ old('password') }}" required autocomplete="password" autofocus>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="input-group input-group-outline mb-2">
                                    <label>{{ __('Confirm Password') }}</label>
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-info">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
