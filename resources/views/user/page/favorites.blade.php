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
                                <li><a href="/dashboard" id="dashboard" data-bs-toggle="tab" class="nav-link ">Tài
                                        khoản của tôi</a></li>
                                <li><a data-bs-target="tab" class="nav-link active">Sản phẩm yêu
                                        thích</a></li>
                                <li><a href="{{ route('user.bill') }}" id="downloads" data-bs-toggle="tab"
                                        class="nav-link ">Đơn hàng của
                                        bạn</a>
                                <li><a href="{{ route('user.logout') }}" class="nav-link">Logout</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-md9 col-lg-9">
                        <div class="row product_column4">
                            {{-- @dd($favorite->product); --}}
                            @foreach ($favorite as $item)
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="{{ route('detail', $item->id) }}"><img
                                                    src="{{ asset('site/img/gallery') }}/{{ $item->prod->images->first()->image }}"
                                                    alt=""></a>
                                            <a class="secondary_img" href="{{ route('detail', $item->id) }}"><img
                                                    src="{{ asset('site/img/gallery') }}/{{ $item->prod->skip(1)->first()->image }}"
                                                    alt=""></a>
                                            <div class="quick_button">
                                                <a href="{{ route('cart.add', $item->prod->id) }}" title="quick_view">Mua
                                                    ngay</a>
                                                <a href="{{ route('detail', $item->prod->id) }}" title="quick_view">Xem sản
                                                    phẩm</a>
                                                @if (Auth::user())
                                                    <div>
                                                        <a title="Bỏ thích"
                                                            onclick="return confirm('Bạn có muốn bỏ thích không')"
                                                            href="{{ route('user.addfavorite', $item->prod->id) }}"><i
                                                                class="bi bi-heart-fill"></i></a>
                                                    </div>
                                                @endif
                                            </div>
                                            @if ($item->prod->price_sale > 0)
                                                <div class="product_sale">
                                                    <span>-{{ $item->prod->percent($item->prod->price_sale, $item->prod->price) }}%
                                                    </span>
                                                </div>
                                            @endif


                                        </div>
                                        <div class="product_content">
                                            <h3><a
                                                    href="{{ route('detail', $item->prod->id) }}">{{ $item->prod->name }}</a>
                                            </h3>
                                            @if ($item->prod->price_sale > 0)
                                                {{-- @dd($item->prod); --}}
                                                <span
                                                    class="current_price">{{ number_format($item->prod->price_sale, 0, '.', ',') }}
                                                    VNĐ</span>
                                                <span
                                                    class="old_price">{{ number_format($item->prod->price, 0, '.', ',') }}
                                                    VNĐ</span>
                                            @else
                                                <span
                                                    class="current_price">{{ number_format($item->prod->price, 0, '.', ',') }}
                                                    VNĐ</span>
                                            @endif
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
    </section>
    <!-- my account end   -->

@endsection
