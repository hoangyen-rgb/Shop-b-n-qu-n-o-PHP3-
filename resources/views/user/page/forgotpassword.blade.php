@extends('layout.layoutsite')

@section('title', 'Quên mật khẩu')
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
                            <li>Quên mật khẩu</li>
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
            <div class="row">
                {{-- <div class="col-lg-1 col-md-1 mr-auto">
                </div> --}}
                <!--login area start-->
                <div class="col-lg-7 col-md-7 mr-auto">
                    <div class="account_form">
                        <h2>Quên mật khẩu</h2>
                        <form action="#">
                            <p>
                                <label>Nhập email của bạn <span>*</span></label>
                                <input type="text">
                            </p>
                            <p>
                            <div class="login_submit">
                                <button type="submit">Lấy mật khẩu</button>

                            </div>

                    </div>

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
