@extends('layout.layoutsite')

@section('title', 'Trang Chủ')

@section('content')
    <?php $product = new \App\Models\Products(); ?>
    <!--slider area start-->
    <div class="slider_area slider_style home_three_slider owl-carousel">
        {{-- @dd($banners); --}}
        @foreach ($banners as $item)
            {{-- @dd($item->image); --}}
            <div class="single_slider" data-bgimg="{{ asset('site/img/slider') }}/{{ $item->image }}">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="slider_content content_one">
                                <img src="{{ asset('site/img/slider') }}/{{ $item->content }}" alt="">
                                <p>{{ $item->text }}</p>

                                <a href="{{ route('user.shop') }}">Khám phá ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <!--slider area end-->
    <!--product section area start-->
    <section class="product_section womens_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Sản phẩm của chúng tôi</h2>
                        <p>Các sản phẩm thiết kế hiện đại,mới nhất</p>
                    </div>
                </div>
            </div>
            <div class="product_area">
                <div class="row">
                    <div class="col-12">
                        <div class="product_tab_button">
                            <ul class="nav" role="tablist">
                                @foreach ($list_categories as $item)
                                    <li>
                                        <a data-toggle="tab" href="#clothing" role="tab" aria-controls="clothing"
                                            aria-selected="true">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="clothing" role="tabpanel">
                        <div class="product_container">
                            <div class="row product_column4">
                                {{-- @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif --}}
                                @foreach ($products as $item)
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="{{ route('detail', $item->id) }}"><img
                                                        src="{{ asset('site/img/gallery') }}/{{ $item->images->first()->image }}"
                                                        alt=""></a>
                                                <a class="secondary_img" href="{{ route('detail', $item->id) }}"><img
                                                        src="{{ asset('site/img/gallery') }}/{{ $item->images->skip(1)->first()->image }}"
                                                        alt=""></a>
                                                <div class="quick_button">
                                                    {{-- <a href="{{ route('cart.add', $item->id) }}" title="quick_view">Mua
                                                        ngay</a> --}}
                                                    <a href="{{ route('detail', $item->id) }}" title="quick_view">Xem sản
                                                        phẩm</a>
                                                    @if (Auth::user())
                                                        <div>
                                                            @if ($item->favorited)
                                                                <a title="Bỏ thích"
                                                                    onclick="return confirm('Bạn có muốn bỏ thích không')"
                                                                    href="{{ route('user.addfavorite', $item->id) }}"><i
                                                                        class="bi bi-heart-fill"></i></a>
                                                            @else
                                                                <a title="Yêu thích"
                                                                    href="{{ route('user.addfavorite', $item->id) }}"><i
                                                                        class="bi bi-heart"></i></a>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                                @if ($item->price_sale > 0)
                                                    <div class="product_sale">
                                                        <span>-{{ $product->percent($item->price_sale, $item->price) }}%
                                                        </span>
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
                                                    <span
                                                        class="current_price">{{ number_format($item->price, 0, '.', ',') }}
                                                        VNĐ</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="handbag" role="tabpanel">
                        <div class="product_container">
                            <div class="row product_column4">
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product20.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product19.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Marshall Portable Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product19.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product18.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                            <div class="label_product">
                                                <span>new</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Koss KPH7 Portable</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product17.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product16.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats Solo2 Solo 2</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product15.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product14.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats EP Wired</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product13.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product12.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Bose SoundLink Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product11.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product10.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Apple iPhone SE 16GB</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product9.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product18.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                            <div class="label_product">
                                                <span>new</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">JBL Flip 3 Portable</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product7.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product6.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats Solo Wireless</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product5.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product4.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Apple iPad with Retina</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product3.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product2.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Marshall Portable Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="shoes" role="tabpanel">
                        <div class="product_container">
                            <div class="row product_column4">
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product10.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product11.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                            <div class="label_product">
                                                <span>new</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Marshall Portable Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product11.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product12.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Koss KPH7 Portable</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product13.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product9.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats Solo2 Solo 2</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product8.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product7.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats EP Wired</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product12.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product13.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Bose SoundLink Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product10.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product11.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Apple iPhone SE 16GB</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product13.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product14.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                            <div class="double_base">
                                                <div class="product_sale">
                                                    <span>-7%</span>
                                                </div>
                                                <div class="label_product">
                                                    <span>new</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">JBL Flip 3 Portable</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product15.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product16.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats Solo Wireless</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product18.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product17.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Apple iPad with Retina</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product19.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product20.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Marshall Portable Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="accessories" role="tabpanel">
                        <div class="product_container">
                            <div class="row product_column4">
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product1.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product2.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Marshall Portable Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product4.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product3.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Koss KPH7 Portable</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product6.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product5.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                            <div class="label_product">
                                                <span>new</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats Solo2 Solo 2</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product7.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product8.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats EP Wired</a></h3>
                                            <span class="current_price">£60.00</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product10.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product9.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Bose SoundLink Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product10.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product11.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Apple iPhone SE 16GB</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product13.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product14.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                            <div class="double_base">
                                                <div class="product_sale">
                                                    <span>-7%</span>
                                                </div>
                                                <div class="label_product">
                                                    <span>new</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">JBL Flip 3 Portable</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product15.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product16.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Beats Solo Wireless</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product18.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product17.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>
                                            <div class="label_product">
                                                <span>new</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Apple iPad with Retina</a></h3>
                                            <span class="current_price">£60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="site/img/product/product19.jpg" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="site/img/product/product20.jpg" alt=""></a>

                                            <div class="quick_button">
                                                <a href="/detail" title="quick_view">Xem sản phẩm</a>
                                            </div>

                                            <div class="product_sale">
                                                <span>-7%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Marshall Portable Bluetooth</a></h3>
                                            <span class="current_price">£60.00</span>
                                            <span class="old_price">£86.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

        </div>
    </section>
    <!--product section area end-->

    <!--banner area start-->
    <section class="banner_section banner_section_three">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-6 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="site/img/bg/banner11.jpg" alt="#"></a>
                            <div class="banner_content">
                                <h1>Bộ Sưu Tập <br> Dành Cho Nam</h1>
                                <a href="shop.html">Xem Ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="site/img/bg/banner12.jpg" alt="#"></a>
                            <div class="banner_content">
                                <h1>Bộ Sưu Tập <br> Giày Thể Thao Nữ </h1>
                                <a href="shop.html">xem Ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--banner area end-->

    <!--product section area start-->
    <section class="product_section womens_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Sản phẩm thịnh hành</h2>
                        <p>Sản phẩm ấn tượng và bán chạy nhất</p>
                    </div>
                </div>
            </div>
            <div class="product_area">
                <div class="row">
                    <div class="product_carousel product_three_column4 owl-carousel">
                        {{-- @foreach ($productNew as $item)
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ route('detail', $item->id) }}"><img
                                                src="{{ asset('site/img/gallery') }}/{{ $item->images->first()->image }}"
                                                alt=""></a>
                                        <a class="secondary_img" href="{{ route('detail', $item->id) }}"><img
                                                src="{{ asset('site/img/gallery') }}/{{ $item->images->skip(1)->first()->image }}"
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
                        @endforeach --}}
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--product section area end-->

    <!--brand section area start-->
    <section class="product_section womens_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Thương hiệu</h2>
                    </div>
                </div>
            </div>
            <div class="product_area">
                <div class="row">
                    <div class="product_carousel product_three_column4 owl-carousel">
                        @foreach ($list_brands as $item)
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <img src="site/img/brand/{{ $item->logo }}" alt="">
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--brand section area end-->
@endsection
