@extends('layout.layoutsite')
@section('title', 'Tài khoản của bạn')
@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>/</li>
                            <li>my account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- my account start  -->
    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <!-- Left Navigation Sidebar -->
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="{{ route('user.myaccount') }}" id="dashboard" data-bs-toggle="tab"
                                        class="nav-link active">Tài
                                        khoản của tôi</a></li>
                                <li><a href="{{ route('user.favorite') }}" id="orders" data-bs-toggle="tab"
                                        class="nav-link">Sản phẩm yêu thích</a></li>
                                <li><a href="{{ route('user.bill') }}" id="downloads" data-bs-toggle="tab"
                                        class="nav-link">Đơn hàng của
                                        bạn</a>
                                </li>
                                <li><a href="{{ route('user.logout') }}" class="nav-link">Logout</a></li>

                            </ul>
                        </div>
                    </div>

                    <!-- Main Content Area -->

                    <div class="col-sm-12 col-md-9 col-lg-9">
                        @if (session('success'))
                            <div class="alert alert-success fw-bold">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h3>Tài khoản của tôi</h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="{{ route('user.update') }}" method="POST">
                                        @csrf
                                        <br>
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <label>Tên</label>
                                        <input type="text" name="name" value="{{ $user->name ? $user->name : '' }}"
                                            required>
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{ $user->email ? $user->email : '' }}"
                                            required>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password" value="">
                                        <label>Điện thoại</label>
                                        <input type="tel" name="phone"
                                            value="{{ $user->phone_number ? $user->phone_number : '' }}" required>
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label>Địa chỉ liên hệ</label>
                                        <input type="text" name="address"
                                            value="{{ $user->address ? $user->address : '' }}" required>
                                        <div class="save_button primary_btn default_button">
                                            <button onclick="return confirm('Bạn có chắc muốn cập nhật thông tin')"
                                                type="submit">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- my account end   -->

@endsection
