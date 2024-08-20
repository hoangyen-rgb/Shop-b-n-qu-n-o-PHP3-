@extends('layout.layoutsite')

@section('title', 'Đăng nhập')
@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li>/</li>
                            <li>Đăng nhập</li>
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
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>Đăng nhập</h2>
                        <form action="" method="POST">
                            @csrf
                            <p>
                                <label>Nhập email của bạn <span class="required">*</span></label>
                                <input type="email" name="email">
                            </p>
                            <p>
                                <label>Nhập Mật khẩu của bạn<span class="required">*</span></label>
                                <input type="password" name="password">
                            </p>
                            <div class="login_submit  pb-2">
                                <a href="/forgotpassword">Bạn quên mật khẩu?</a>
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    ghi nhớ
                                </label>
                                <button type="submit">Đăng nhập</button>

                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
                <!--login area start-->
            </div>
        </div>
    </div>
    <!-- customer login end -->
    <!-- customer login end -->
@endsection
