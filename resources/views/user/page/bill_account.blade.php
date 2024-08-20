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
                        <div class="row">
                            <div class="col-12">
                                <h3>Đơn Hàng Của Bạn</h3>
                            </div>
                        </div>
                        <div class="list-group">
                            @foreach ($bills as $item)
                                <div class="list-group-item">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5 class="mb-1">Đơn Hàng #{{ $item->id }}</h5>
                                            <p class="mb-1">Ngày Đặt:
                                                {{ $item->created_at->format('d/m/Y') }}</p>
                                            <p class="mb-1">Trạng Thái:
                                                @if ($item->status == 1)
                                                    Đang xử lý
                                                @elseif($item->status == 2)
                                                    Đã xác nhận
                                                @elseif($item->status == 3)
                                                    Đang giao hàng
                                                @elseif($item->status == 4)
                                                    Đã giao
                                                @else
                                                    Đơn hàng đã huỷ
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-4 text-end">
                                            <a href="{{ route('user.show', $item->id) }}" class="btn btn-primary">Xem Chi
                                                Tiết</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
