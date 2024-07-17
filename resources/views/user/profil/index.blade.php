@extends('layouts.frontend.user')
@section('content')
<div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{asset('user/assets/img/pp wa.jpeg')}}" class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ Auth::user()->username }}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        {{ Auth::user()->fullname }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">User Information</p>
                    <form action="{{route('profil.update' , Auth::user()->id )}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Username</label>
                                    <input class="form-control" name="username" type="text"
                                        value="{{ Auth::user()->username }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Fullname</label>
                                    <input class="form-control" name="fullname" type="text"
                                        value="{{ Auth::user()->fullname }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email address</label>
                                    <input class="form-control" name="email" type="email"
                                        value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Address</label>
                                    <input class="form-control" name="alamat" type="text"
                                        value="{{ Auth::user()->alamat }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Gender</label>
                                    <select name="jenis_kelamin" id="" class="form-control">
                                        <option value="" selected disabled>{{ Auth::user()->jenis_kelamin }}</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Phone Number</label>
                                    <input class="form-control" name="no_telepon" type="text"
                                        value="{{ Auth::user()->no_telepon }}">
                                </div>
                            </div>
                            <div class="mb-2">
                                <button class="btn btn-sm btn-success" type="submit">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile">
                <img src="{{asset('user/assets/img/bg profil.jpg')}}" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-4 col-lg-4 order-lg-2">
                        <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                            <a href="javascript:;">
                                <img src="{{asset('user/assets/img/pp wa.jpeg')}}"
                                    class="rounded-circle img-fluid border border-2 border-white">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="text-center mt-4">
                        <h5>
                            {{ Auth::user()->username }}
                        </h5>
                        <div class="h6 font-weight-300">
                            <i class="ni location_pin mr-2"></i>{{ Auth::user()->alamat }}
                        </div>
                        <div class="h6 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>{{ Auth::user()->email }}
                        </div>
                        <div>
                            <i class="ni education_hat mr-2"></i>{{ Auth::user()->no_telepon }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
