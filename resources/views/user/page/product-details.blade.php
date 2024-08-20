@extends('layout.layoutsite')
@section('title', 'Sản phẩm chi tiết')
@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area product_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">Trang Chủ</a></li>
                            <li>/</li>
                            <li>{{ $product->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="product-details-tab">

                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1"
                                    src="{{ asset('site/img/gallery') }}/{{ $product->images->first()->image }}"
                                    data-zoom-image="{{ asset('site/img/gallery') }}/{{ $product->images->first()->image }}"
                                    alt="big-1">
                            </a>
                        </div>

                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                @foreach ($product->images as $item)
                                    <li>
                                        <a href="#" class="elevatezoom-gallery active" data-update=""
                                            data-image="{{ asset('site/img/gallery') }}/{{ $item->image }}"
                                            data-zoom-image="{{ asset('site/img/gallery') }}/{{ $item->image }}">
                                            <img src="{{ asset('site/img/gallery') }}/{{ $item->image }}"
                                                alt="zo-th-1" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="product_d_right">
                        <form action="{{ route('cart.add', $product->id) }}" method="post">
                            <h1>{{ $product->name }}</h1>
                            <div class="product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="review"><a href="#"> 1 đánh giá </a></li>
                                </ul>
                            </div>
                            <div class="product_price">
                                <span class="product-price">{{ number_format($product->price, 0, '.', ',') }} VNĐ</span>
                            </div>
                            <div class="product_desc">
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="product_variant color">
                                <h3>Màu:</h3>
                                <select class="niceselect_option" id="color" name="color">
                                    @foreach ($colors as $item)
                                        <option value="{{ $item->colors->name }}">{{ $item->colors->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="product_variant size">
                                <h3>Kích cỡ:</h3>
                                <select class="niceselect_option" id="color1" name="size">
                                    @if ($product->type == 'quan')
                                        @foreach ($pantSizes as $size)
                                            <option selected value="{{ $size->name }}">{{ $size->name }}</option>
                                        @endforeach
                                    @elseif ($product->type == 'ao')
                                        @foreach ($clothingSizes as $size)
                                            <option selected value="{{ $size->name }}">{{ $size->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Không có kích cỡ</option>
                                    @endif
                                </select>
                            </div>

                            @csrf

                            <div class="product_variant quantity">
                                <label>Số Lượng</label>
                                <input min="1" max="100" value="1" type="number" name="quantity">
                                @if (Auth::user())
                                    <button class="button" type="submit">THÊM VÀO GIỎ HÀNG</button>
                                @else
                                    <a href="{{ route('user.login') }}" class="button">ĐĂNG NHẬP ĐỂ MUA HÀNG</a>
                                @endif
                            </div>
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="image" value="{{ $product->images->first()->image }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                        aria-selected="false">GIỚI THIỆU</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                        aria-selected="false">ĐÁNH GIÁ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">

                            <div class="tab-pane fade" id="sheet" role="tabpanel">
                                <div class="product_d_table">
                                    <form action="#">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="first_child">Compositions</td>
                                                    <td>Polyester</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Styles</td>
                                                    <td>Girly</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Properties</td>
                                                    <td>Short Dress</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="product_info_content">
                                    <p>Fashion has been creating well-designed collections since 2010. The brand offers
                                        feminine designs delivering stylish separates and statement dresses which have since
                                        evolved into a full ready-to-wear collection in which every item is a vital part of
                                        a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and
                                        unmistakable signature style. All the beautiful pieces are made in Italy and
                                        manufactured with the greatest attention. Now Fashion extends to a range of
                                        accessories including shoes, hats, belts and more!</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="product_info_content">
                                    <p>Fashion has been creating well-designed collections since 2010. The brand offers
                                        feminine designs delivering stylish separates and statement dresses which have since
                                        evolved into a full ready-to-wear collection in which every item is a vital part of
                                        a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and
                                        unmistakable signature style. All the beautiful pieces are made in Italy and
                                        manufactured with the greatest attention. Now Fashion extends to a range of
                                        accessories including shoes, hats, belts and more!</p>
                                </div>
                                <div class="product_info_inner">
                                    <div class="product_ratting mb-10">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                        <strong>Posthemes</strong>
                                        <p>09/07/2018</p>
                                    </div>
                                    <div class="product_demo">
                                        <strong>demo</strong>
                                        <p>That's OK!</p>
                                    </div>
                                </div>
                                <div class="product_review_form">
                                    <form action="#">
                                        <h2>Add a review </h2>
                                        <p>Your email address will not be published. Required fields are marked </p>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">Your review </label>
                                                <textarea name="comment" id="review_comment"></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="author">Name</label>
                                                <input id="author" type="text">

                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">Email </label>
                                                <input id="email" type="text">
                                            </div>
                                        </div>
                                        <button type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    <!--product section area start-->
    <section class="product_section related_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Sản phẩm liên quan</h2>
                        <p>Các thiết kế đương đại, tối giản và hiện đại thể hiện chữ viết tay Lavish Alice </p>
                    </div>
                </div>
            </div>
            <div class="product_area">
                <div class="row">
                    <div class="product_carousel product_three_column4 owl-carousel">
                        @foreach ($related as $item)
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">

                                        <a class="primary_img" href="{{ route('detail', $item->id) }}"><img
                                                src="{{ asset('site/img/product') }}/{{ $item->images->first()->image }}"
                                                alt=""></a>
                                        <a class="secondary_img" href="{{ route('detail', $item->id) }}"><img
                                                src="{{ asset('site/img/product') }}/{{ $item->images->skip(1)->first()->image }}"
                                                alt=""></a>
                                        <div class="quick_button">
                                            <a href="{{ route('detail', $item->id) }}" title="quick_view">Xem sản
                                                phẩm</a>
                                        </div>
                                        @if ($item->price_sale > 0)
                                            <div class="product_sale">
                                                <span>-{{ $product->percent($item->price_sale, $item->price) }}%</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product_content">
                                        <h3><a href="{{ route('detail', $item->id) }}">{{ $item->name }}</a>
                                        </h3>
                                        @if ($item->price_sale > 0)
                                            <span
                                                class="current_price">{{ number_format($item->price_sale, 0, '.', ',') }}
                                                VNĐ</span>
                                            <span class="old_price">{{ number_format($item->price, 0, '.', ',') }}
                                                VNĐ</span>
                                        @else
                                            <span class="current_price">{{ number_format($item->price, 0, '.', ',') }}
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
    </section>
    <!--product section area end-->
@endsection
