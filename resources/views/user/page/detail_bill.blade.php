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
                                        class="nav-link ">Tài
                                        khoản của tôi</a></li>
                                <li><a href="{{ route('user.favorite') }}" id="bills" data-bs-toggle="tab"
                                        class="nav-link">Sản phẩm yêu thích</a></li>
                                <li><a href="{{ route('user.bill') }}" id="downloads" data-bs-toggle="tab"
                                        class="nav-link active">Đơn hàng của
                                        bạn</a>
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
                        <h3 class="mb-4">Đơn hàng chi tiết</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Thông tin đơn hàng</h5>
                                        <p>Mã đơn hàng: </p>
                                        <p>Ngày tạo: 2023-06-11</p>
                                        <p>Trạng thái: @if ($bill->status == 1)
                                                Đang xử lý
                                            @elseif($bill->status == 2)
                                                Đã xác nhận
                                            @elseif($bill->status == 3)
                                                Đang giao hàng
                                            @elseif($bill->status == 4)
                                                Đã giao
                                            @else
                                                Đơn hàng đã huỷ
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Thông tin giao hàng</h5>
                                        <p>Tên: {{ $bill->user->name }}</p>
                                        <p>Địa chỉ: {{ $bill->user->address }}</p>
                                        <p>Số điện thoại: {{ $bill->user->phone_number }}</p>
                                    </div>
                                </div>
                                <hr>
                                <h5>Sản phẩm</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Hình ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Kích thước</th>
                                            <th>Màu sắc</th>
                                            <th>Giá</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @foreach ($bill->items as $item)
                                            <tr>
                                                <td class="align-items-center"><img width="100px"
                                                        src="{{ asset('site/img/gallery') }}/{{ $item->product->images->first()->image }}"
                                                        alt=""></td>
                                                <th>{{ $item->quantity }}</th>
                                                <th>{{ $item->size }}</th>
                                                <th>{{ $item->color }}</th>
                                                <th>{{ number_format($price = $item->product->price_sale > 0 ? $item->product->price_sale : $item->product->price, 0, '.', ',') }}
                                                    VNĐ
                                                </th>
                                                <th>{{ number_format($item->quantity * $price) }} VNĐ</th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row justify-content-end">
                                    <div class="col-md-4">
                                        <h5>Tổng tiền: {{ number_format($bill->total) }} VNĐ</h5>
                                    </div>
                                </div>
                                @if ($bill->status == 1)
                                    <a href="{{ route('user.billcancel', $bill->id) }}" class="btn btn-danger ">Huỷ</a>
                                @endif
                            </div>
                        </div>
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
