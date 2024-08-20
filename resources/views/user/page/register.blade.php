@extends('layout.layoutsite')

@section('title', 'Đăng ký')
@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="user.home">Trang chủ</a></li>
                            <li>/</li>
                            <li><a href="user.register">Đăng ký</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row justify-content-center">
                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        <h2>Đăng ký</h2>
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nhập tên của bạn<span>*</span></label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        <h5>{{ $message }}</h5>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Nhập email<span>*</span></label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <h5>{{ $message }}</h5>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Nhập mật khẩu<span>*</span></label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" autocomplete="off"
                                    required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <h5>{{ $message }}</h5>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Xác nhận mật khẩu<span>*</span></label>
                                <input type="password" id="password-confirm" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    autocomplete="off" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        <h5>{{ $message }}</h5>
                                    </div>
                                @enderror
                            </div>
                            <div class="row pt-1">
                                <div class="col-md-9">
                                    <a href="#">Bạn đã có tài khoản?</a>
                                </div>
                                <div class="col-md-3">
                                    <a href="">Quên mật khẩu?</a>
                                </div>
                            </div>
                            <div class="login_submit pt-2">
                                <button type="submit" class="btn btn-primary">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
    <!-- customer login end -->
    <!-- customer login end -->
@endsection
