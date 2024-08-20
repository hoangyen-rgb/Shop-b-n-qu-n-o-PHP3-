@extends('layout.layoutsite')
@section('title', 'Giỏ hàng')
@section('content')
    <?php $cart = new \App\Models\Cart(); ?>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li>/</li>
                            <li>Giỏ hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- shopping cart area start -->
    <div class="shopping_cart_area">
        <div class="container">
            <form action="#">
                @if (session('success'))
                    <div class="alert alert-success fw-bold">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_thumb">Hình ảnh</th>
                                            <th class="product_name">Tên</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product_quantity">Số lượng</th>
                                            <th class="product_quantity">Màu</th>
                                            <th class="product_quantity">Kích thước</th>
                                            <th class="product_total">Tổng cộng</th>
                                            <th class="product_remove">Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @dd($Itemcart) --}}
                                        @foreach ($Itemcart as $item)
                                            {{-- @dd($item->product->images->first()->image); --}}

                                            <tr>
                                                <td class="product_thumb"><a
                                                        href="{{ route('detail', $item->product->id) }}"><img
                                                            src="{{ asset('site/img/gallery') }}/{{ $item->product->images->first()->image }}"
                                                            class="img-fluid" width="50" height="50"
                                                            alt=""></a></td>
                                                <td class="product_name"><a
                                                        href="{{ route('detail', $item->product->id) }}">{{ $item->product->name }}</a>
                                                </td>
                                                <td class="product-price">
                                                    {{ number_format($price = $item->product->price_sale > 0 ? $item->product->price_sale : $item->product->price, 0, '.', ',') }}
                                                    VNĐ
                                                </td>

                                                <td class="product_quantity">
                                                    {{ $item->quantity }}

                                                </td>
                                                <td class="product_quantity">
                                                    {{ $item->color }}
                                                </td>
                                                <td class="product_quantity">
                                                    {{ $item->size }}
                                                </td>
                                                <td class="product_total">
                                                    {{ number_format($total_price = $item->quantity * $price, 0, '.', ',') }}
                                                    VNĐ
                                                </td>

                                                <td class="product_remove"><a
                                                        onclick="return confirm('Bạn có chắc muốn xoá không ?')"
                                                        href="{{ route('cart.delete', $item->id) }}"><i
                                                            class="fa fa-trash-o"></i></a>
                                            </tr>
                                        @endforeach
                                        {{-- <button type="submit" class="btn btn-primary">Cập nhật</button> --}}
            </form>
            </tbody>
            </table>
        </div>
        {{-- <div class="cart_submit">
                                <button type="submit">update cart</button>
                            </div> --}}
    </div>
    </div>
    </div>

    <!--coupon code area start-->
    {{-- @dd($Itemcart) --}}
    @if (count($Itemcart) > 0)
        <div class="coupon_area">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code left ">
                        <h3>PHIẾU MUA HÀNG</h3>
                        <div class="coupon_inner">
                            <p>Nhập mã phiếu giảm giá của bạn nếu bạn có..</p>
                            <input placeholder="Mã giảm giá" type="text">
                            <button type="submit">ÁP DỤNG PHIẾU GIẢM GIÁ</button>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href = "{{ route('user.home') }}" class="btn btn-primary fw-bold text-white">TIẾP
                            TỤC
                            MUA HÀNG</a>
                        <a onclick="return confirm('Bạn chắc muốn xoá rỗng giỏ hàng ?')" href = "{{ route('cart.clear') }}"
                            class="btn btn-danger">XOÁ GIỎ HÀNG</a>
                    </div>

                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code right">
                        <h3>TỔNG SỐ GIỎ HÀNG</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Tổng phụ</p>


                                <p class="cart_amount">{{ number_format($cart->getTotalPrice($Itemcart)) }} VNĐ
                                </p>
                            </div>
                            <div class="cart_subtotal ">
                                <p>Phí ship</p>
                                <p class="cart_amount"><span>Giá cố định:</span> £20.00</p>
                            </div>
                            <a href="#">Tính toán vận chuyển</a>

                            <div class="cart_subtotal">
                                <p>Tổng cộng</p>
                                <p class="cart_amount">{{ number_format($cart->getTotalPrice($Itemcart)) }} VNĐ</p>
                            </div>
                            <div class="checkout_btn">
                                <a href="{{ route('cart.checkout') }}">TIẾN HÀNH KIỂM TRA</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <hr>
        <div class="pb-2 text-center">
            <a href = "{{ route('user.shop') }}" class="btn btn-primary fw-bold text-white">TIẾP TỤC
                MUA HÀNG</a>
        </div>
        <hr>
        <div class="alert alert-danger">
            <h4 class="alert-heading text-center"> Giỏ hàng rỗng
            </h4>
            <p class="text-center">Vui lòng tiếp tục mua hàng</p>
        </div>
    @endif
    <!--coupon code area end-->

    </form>
    </div>
    </div>
@endsection
