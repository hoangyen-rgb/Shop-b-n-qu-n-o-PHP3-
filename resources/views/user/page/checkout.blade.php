@extends('layout.layoutsite')
@section('title', 'Thủ tục thanh toán')
@section('content')
    <?php $cart = new \App\Models\Cart(); ?>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">Trang Chủ</a></li>
                            <li>/</li>
                            <li>Thủ tục thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--Checkout page section-->
    <div class="Checkout_section" id="accordion">
        <div class="container">
            <div class="checkout_form">
                <form action="{{ route('cart.bill') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <h3>Thông tin</h3>
                            <div class="row">
                                <div class="col-12 mb-20">
                                    <label>Tên <span>*</span></label>
                                    <input type="text" value="{{ $user->name }}">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Email</label>
                                    <input type="text" value="{{ $user->email }}">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Số điện thoại</label>
                                    <input type="text" name="phone"
                                        value="{{ $user->phone_number ? $user->phone_number : '' }}">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="address" value="{{ $user->address ? $user->address : '' }}">
                                </div>
                                <div class="col-12">
                                    <div class="order-notes">
                                        <label for="order_note">Ghi chú</label>
                                        <textarea id="order_note" placeholder="Nhập ghi chú trong đây." name="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h3>ĐƠN HÀNG CỦA BẠN</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Itemcart as $cart)
                                            <tr>
                                                <td> {{ $cart->product->name }} <strong> × {{ $cart->quantity }}</strong>
                                                </td>
                                                <td> {{ $total = number_format($price = $cart->product->price_sale > 0 ? $cart->product->price_sale : $cart->product->price * $cart->quantity, 0, '.', ',') }}VNĐ
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tổng phụ của giỏ hàng</th>
                                            <td>{{ number_format($cart->getTotalPrice($Itemcart)) }} VNĐ</td>
                                        </tr>
                                        <tr>
                                            <th>Phí ship</th>
                                            <td><strong>$5.00</strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Tổng đơn hàng</th>
                                            <td><strong>{{ number_format($cart->getTotalPrice($Itemcart)) }}
                                                    VNĐ</strong>
                                                <input type="hidden" name="totalPrice"
                                                    value="{{ $cart->getTotalPrice($Itemcart) }}">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_method">
                                {{-- <div class="panel-default">
                                    <input id="payment" name="check_method" type="radio"
                                        data-bs-target="createp_account" />
                                    <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult"
                                        aria-controls="collapsedefult">Thanh toán ATM<img src="assets/img/icon/papyel.png"
                                            alt="">
                                    </label>
                                </div> --}}
                                <div class="panel-default">
                                    <input id="payment_defult" name="check_method" type="radio"
                                        data-bs-target="createp_account" />
                                    <label for="payment_defult" name="pays" data-bs-toggle="collapse"
                                        data-bs-target="#collapsedefult" aria-controls="collapsedefult">Thanh toán khi nhận
                                        hàng<img src="assets/img/icon/papyel.png" alt=""></label>
                                </div>
                                <div class="order_button">
                                    <button type="submit">THANH TOÁN</button>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!--Checkout page section end-->

@endsection
